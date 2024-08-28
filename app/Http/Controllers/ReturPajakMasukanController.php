<?php

namespace App\Http\Controllers;

use App\Models\PajakMasukanRetur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReturPajakMasukanController extends Controller
{
    public function index()
    {
        $data = PajakMasukanRetur::all();
        $totalRecords = PajakMasukanRetur::count();

        return view('admin/retur-pajak-masukan', ['data' => $data, 'totalRecords' => $totalRecords]);
    }

}
?>
