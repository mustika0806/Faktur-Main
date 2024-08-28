<?php

namespace App\Http\Controllers;

use App\Models\PajakMasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PajakMasukanController extends Controller
{
    public function index()
    {
        $data = PajakMasukan::all();
        $totalRecords = PajakMasukan::count();

        return view('admin/pajak-masukan-administrasi', ['data' => $data, 'totalRecords' => $totalRecords]);
    }

}
?>
