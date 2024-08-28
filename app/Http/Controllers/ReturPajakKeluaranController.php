<?php

namespace App\Http\Controllers;

use App\Models\PajakKeluaranRetur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReturPajakKeluaranController extends Controller
{
    public function index()
    {
        $data = PajakKeluaranRetur::all();
        $totalRecords = PajakKeluaranRetur::count();

        return view('admin/retur-pajak-keluaran', ['data' => $data, 'totalRecords' => $totalRecords]);
    }

}
?>
