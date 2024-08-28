<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLocal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdministrasiUserController extends Controller
{
    public function index()
    {
        $data = User::with('user_local')->get();
        $totalRecords = User::count();

        return view('admin/administrasi-user', ['data' => $data, 'totalRecords' => $totalRecords]);
    }


    public function addAdmin(Request $request)
    {

        $rules = array(
            'admin_tambah_npwp_pkp' => 'required|exists:registrasi_pkp,npwp',
            'admin_tambah_nama_user' => 'required|unique:users,nama_user',
            'admin_tambah_name' => 'required',
            'admin_tambah_password' => 'required',
            'admin_tambah_ulangi_password' => 'required|same:admin_tambah_password',
        );

        $customMessage = array(
            'admin_tambah_npwp_pkp.required' => 'Kolom NPWP wajib diisi!',
            'admin_tambah_npwp_pkp.exists' => 'NPWP yang dimasukkan tidak terdaftar.',
            'admin_tambah_nama_user.required' => 'Kolom Nama User wajib diisi!',
            'admin_tambah_nama_user.unique' => 'Nama User sudah digunakan, masukkan nama user lain.',
            'admin_tambah_name.required' => 'Kolom Nama Lengkap wajib diisi!',
            'admin_tambah_password.required' => 'Kolom Password wajib diisi!',
            'admin_tambah_ulangi_password.required' => 'Kolom Ulangi Password wajib diisi!',
            'admin_tambah_ulangi_password.same' => 'Password dan Ulangi Password harus sama.',
        );


        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['modalTambahAdmin' => 'open'])
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }

        try {
            // Begin database transaction
            DB::beginTransaction();

            $userData = [
                'nama_user' => $request->admin_tambah_nama_user,
                'name' => $request->admin_tambah_name,
                'isUserLocal' => 1, // Assuming this is a static value
                'password' => Hash::make($request->admin_tambah_password), // Assuming this is a static value
                'npwp_pkp' => $request->admin_tambah_npwp_pkp,
            ];

            // Insert into the User table
            $user = new User($userData);
            $user->save();

            $userLocalData = [
                'nama_user' => $request->admin_tambah_nama_user,
                'users_id' => $user->id,
                'role' => 'Admin', // Assuming this is a static value
            ];

            // Insert into the Userlocal table
            $userLocal = new Userlocal($userLocalData);
            $userLocal->save();

            // Commit the transaction if everything is successful
            DB::commit();


            Alert::success('Berhasil', 'Admin Baru berhasil ditambahkan !');

            return redirect()->back()->withInput(null);
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();
            Alert::error('Gagal', 'Silahkan periksa kembali data yang Anda masukkan !');

            // You can handle the error in a way that suits your application
            return redirect()->back()->with(['error' => $e->getMessage()])
                ->with(['modalTambahAdmin' => 'open']);
        }
    }
    public function addPerekam(Request $request)
    {

        $rules = array(
            'perekam_tambah_npwp_pkp' => 'required|exists:registrasi_pkp,npwp',
            'perekam_tambah_nama_user' => 'required|unique:users,nama_user',
            'perekam_tambah_name' => 'required',
            'perekam_tambah_password' => 'required',
            'perekam_tambah_ulangi_password' => 'required|same:perekam_tambah_password',
        );

        $customMessage = array(
            'perekam_tambah_npwp_pkp.required' => 'Kolom NPWP wajib diisi!',
            'perekam_tambah_npwp_pkp.exists' => 'NPWP yang dimasukkan tidak terdaftar.',
            'perekam_tambah_nama_user.required' => 'Kolom Nama User wajib diisi!',
            'perekam_tambah_nama_user.unique' => 'Nama User sudah digunakan, masukkan nama user lain.',
            'perekam_tambah_name.required' => 'Kolom Nama Lengkap wajib diisi!',
            'perekam_tambah_password.required' => 'Kolom Password wajib diisi!',
            'perekam_tambah_ulangi_password.required' => 'Kolom Ulangi Password wajib diisi!',
            'perekam_tambah_ulangi_password.same' => 'Password dan Ulangi Password harus sama.',
        );

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['modalTambahPerekam' => 'open'])
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }


        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create a new user
            $user = User::create([
                'name' => $request->perekam_tambah_name,
                'nama_user' => $request->perekam_tambah_nama_user,
                'password' => Hash::make($request->perekam_tambah_password),
                'npwp_pkp' => $request->perekam_tambah_npwp_pkp,
                'isUserLocal' => 1,
            ]);

            // Use request->merge to add user_id and other values
            $userLocalData = [
                'nama_user' => $user->nama_user,
                'users_id' => $user->id,
                'role' => 'Pegawai', // Assuming this is a static value
            ];

            // Insert into the Userlocal table
            $userLocal = new Userlocal($userLocalData);
            $userLocal->save();

            // Commit the transaction
            DB::commit();

            Alert::success('Berhasil', 'Pegawai Baru berhasil ditambahkan !');

            return redirect()->back()->withInput(null);
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();
            Alert::error('Gagal', 'Silahkan periksa kembali data yang Anda masukkan !');

            // You can handle the error in a way that suits your application
            return redirect()->back()->with(['error' => $e->getMessage()])
                ->with(['modalTambahPerekam' => 'open']);
        }
    }
    public function edit($id)
    {
        $data = User::where('id', $id)->firstOrFail();
        return view('admin.administrasi-user.edit', ['data' => $data, 'id' => $id]);
    }



    public function updateAdmin(Request $request, $id)
    {


        // ddd( $request );

        $old_username = $request->old_username;
        $ganti_password = $request->input('admin_update_' . $id . '_ganti_password');


        $rules = [
            'admin_update_' . $id . '_npwp_pkp' => 'required|exists:registrasi_pkp,npwp',
            'admin_update_' . $id . '_name' => 'required',
            'admin_update_' . $id . '_password' => 'required_if:admin_update_' . $id . '_ganti_password,1',
            'admin_update_' . $id . '_ganti_password' => 'required_if:admin_update_' . $id . '_ganti_password,1',
        ];

        $validator = Validator::make($request->all(), $rules);

        $validator->sometimes(
            'admin_update_' . $id . '_nama_user',
            'required|unique:users,nama_user,' . $old_username,
            function ($input) use ($request, $id, $old_username) {
                return $request->input('admin_update_' . $id . '_nama_user') !== $old_username;
            }
        );


        $validator->sometimes(

            'admin_update_' . $id . '_ulangi_password', 
            'required_if:admin_update_' . $id . '_ganti_password,1',

            function ($input) use ($request, $id, $ganti_password) {

                if ( $ganti_password ) {
                    return $request->input('admin_update_' . $id . '_ulangi_password') == $request->input('admin_update_' . $id . '_password');
                } else {
                    return true;
                }

        
            });



        $customMessage = [
            'admin_update_' . $id . '_npwp_pkp.required' => 'Kolom NPWP wajib diisi!',
            'admin_update_' . $id . '_npwp_pkp.exists' => 'NPWP yang dimasukkan tidak terdaftar.',
            'admin_update_' . $id . '_nama_user.required' => 'Kolom Nama User wajib diisi!',
            'admin_update_' . $id . '_nama_user.unique' => 'Nama User sudah digunakan, masukkan nama user lain.',
            'admin_update_' . $id . '_name.required' => 'Kolom Nama Lengkap wajib diisi!',
            'admin_update_' . $id . '_password.required_if' => 'Kolom Password wajib diisi jika Ganti Password dipilih!',
            'admin_update_' . $id . '_ulangi_password.required_if' => 'Kolom Ulangi Password wajib diisi jika Ganti Password dipilih!',
            'admin_update_' . $id . '_ulangi_password.same' => 'Password dan Ulangi Password harus sama.',
        ];


        $validator->setCustomMessages($customMessage);



        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['modalEditAdmin' => $id])
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }



        try {
            // Start a database transaction
            DB::beginTransaction();


            $data = User::where('id', $id)->firstOrFail();
            $data->update([
                'name' => $request->input('admin_update_' . $id . '_name'),
                'nama_user' => $request->input('admin_update_' . $id . '_nama_user'),
                'npwp_pkp' => $request->input('admin_update_' . $id . '_npwp_pkp'),
                'isUserLocal' => 1,
            ]);

            // Check if the 'ganti_password' checkbox is checked
            if ($request->has('ganti_password') && $request->input('ganti_password') == 1) {
                // Update the password only when 'ganti_password' is checked
                $data->update(['password' => Hash::make(  $request->input('admin_update_' . $id . '_password') )]);
            }


            // Update the main user record
            $userLocalData = [
                'users_id' => $data->id,
                'nama_user' => $data->nama_user,
                'role' => 'Admin', // Assuming this is a static value
            ];


            // Update the Userlocal record
            UserLocal::updateOrInsert(
                ['users_id' => $id],
                $userLocalData
            );


            DB::commit();


            Alert::success('Berhasil', 'Data Pegawai berhasil diubah !');

            return redirect()->back()->withInput(null);
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();
            Alert::error('Gagal', 'Silahkan periksa kembali data yang Anda masukkan !');

            // You can handle the error in a way that suits your application
            return redirect()->back()->with(['error' => $e->getMessage()])
                ->with(['modalEditAdmin' => $id]);
        }
    }


    // public function update(Request $request, $id)
    // {
    //     $rules = [
    //         'user_lokal.npwp_pkp' => 'required|exists:registrasi_pkp,npwp',
    //         'user_lokal.nama_user' => 'required|unique:users,nama_user,' . $request->nama_user,
    //         'user_lokal.nama_lengkap' => 'required',
    //         'user_lokal.password' => 'required',
    //         'user_lokal.ulangi_password' => 'required|same:password',
    //     ];


    //     $customMessage = array(
    //         'npwp_pkp.required' => 'Kolom NPWP wajib diisi!',
    //         'npwp_pkp.exists' => 'NPWP yang dimasukkan tidak terdaftar.',
    //         'nama_user.required' => 'Kolom Nama User wajib diisi!',
    //         'nama_user.unique' => 'Nama User sudah digunakan, masukkan nama user lain.',
    //         'name.required' => 'Kolom Nama Lengkap wajib diisi!',
    //         'password.required' => 'Kolom Password wajib diisi!',
    //         'ulangi_password.required' => 'Kolom Ulangi Password wajib diisi!',
    //         'ulangi_password.same' => 'Password dan Ulangi Password harus sama.',
    //     );

    //     $validator = Validator::make($request->all(), $rules, $customMessage);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
    //     }

    //     $data = User::where('id', $id)->firstOrFail();
    //     $data->update($request->all());

    //     return redirect()->back()->with('success', 'Data Administrasi User berhasil diperbarui.');
    // }


    public function updatePegawai(Request $request, $id)
    {


        // ddd( $request );

        $old_username = $request->old_username;
        $ganti_password = $request->input('pegawai_update_' . $id . '_ganti_password');


        $rules = [
            'pegawai_update_' . $id . '_npwp_pkp' => 'required|exists:registrasi_pkp,npwp',
            'pegawai_update_' . $id . '_name' => 'required',
            'pegawai_update_' . $id . '_password' => 'required_if:pegawai_update_' . $id . '_ganti_password,1',
            'pegawai_update_' . $id . '_ganti_password' => 'required_if:pegawai_update_' . $id . '_ganti_password,1',
        ];

        $validator = Validator::make($request->all(), $rules);
        

        $validator->sometimes(
            'pegawai_update_' . $id . '_nama_user',
            'required|unique:users,nama_user,' . $old_username,
            function ($input) use ($request, $id, $old_username) {
                return $request->input('pegawai_update_' . $id . '_nama_user') !== $old_username;
            }
        );


        $validator->sometimes(

            'pegawai_update_' . $id . '_ulangi_password', 
            'required_if:pegawai_update_' . $id . '_ganti_password,1',

            function ($input) use ($request, $id, $ganti_password) {

                if ( $ganti_password ) {
                    return $request->input('pegawai_update_' . $id . '_ulangi_password') == $request->input('pegawai_update_' . $id . '_password');
                } else {
                    return true;
                }

        
            });



        $customMessage = [
            'pegawai_update_' . $id . '_npwp_pkp.required' => 'Kolom NPWP wajib diisi!',
            'pegawai_update_' . $id . '_npwp_pkp.exists' => 'NPWP yang dimasukkan tidak terdaftar.',
            'pegawai_update_' . $id . '_nama_user.required' => 'Kolom Nama User wajib diisi!',
            'pegawai_update_' . $id . '_nama_user.unique' => 'Nama User sudah digunakan, masukkan nama user lain.',
            'pegawai_update_' . $id . '_name.required' => 'Kolom Nama Lengkap wajib diisi!',
            'pegawai_update_' . $id . '_password.required_if' => 'Kolom Password wajib diisi jika Ganti Password dipilih!',
            'pegawai_update_' . $id . '_ulangi_password.required_if' => 'Kolom Ulangi Password wajib diisi jika Ganti Password dipilih!',
            'pegawai_update_' . $id . '_ulangi_password.same' => 'Password dan Ulangi Password harus sama.',
        ];


        $validator->setCustomMessages($customMessage);



        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['modalEditPegawai' => $id])
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }



        try {
            // Start a database transaction
            DB::beginTransaction();


            $data = User::where('id', $id)->firstOrFail();
            $data->update([
                'name' => $request->input('pegawai_update_' . $id . '_name'),
                'nama_user' => $request->input('pegawai_update_' . $id . '_nama_user'),
                'npwp_pkp' => $request->input('pegawai_update_' . $id . '_npwp_pkp'),
                'isUserLocal' => 1,
            ]);

            // Check if the 'ganti_password' checkbox is checked
            if ($request->has('ganti_password') && $request->input('ganti_password') == 1) {
                // Update the password only when 'ganti_password' is checked
                $data->update(['password' => Hash::make(  $request->input('pegawai_update_' . $id . '_password') )]);
            }


            // Update the main user record
            $userLocalData = [
                'users_id' => $data->id,
                'nama_user' => $data->nama_user,
                'role' => 'Pegawai', // Assuming this is a static value
            ];


            // Update the Userlocal record
            UserLocal::updateOrInsert(
                ['users_id' => $id],
                $userLocalData
            );


            DB::commit();


            Alert::success('Berhasil', 'Data Pegawai berhasil diubah !');

            return redirect()->back()->withInput(null);
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollback();
            Alert::error('Gagal', 'Silahkan periksa kembali data yang Anda masukkan !');

            // You can handle the error in a way that suits your application
            return redirect()->back()->with(['error' => $e->getMessage()])
                ->with(['modalEditPegawai' => $id]);
        }
    }


    public function delete($id)
    {
        try {
            $data = User::where('id', $id)->firstOrFail();
            $data->delete();


            Alert::success('Berhasil', 'Data User berhasil dihapus');

            return redirect()->back()->with('success', 'Data User berhasil dihapus.')->withInput(null);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            Alert::error('Gagal', 'Data User tidak ditemukan');
            return redirect()->back()->with('error', 'Data User tidak ditemukan.')->withInput(null);
        }
    }
}
