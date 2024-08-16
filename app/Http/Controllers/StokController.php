<?php

namespace App\Http\Controllers;

use App\Models\Stok;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    //
    public function index(){
        $stok = DB::table('m_stok')
        ->join('m_barang', 'm_barang.IdBarang', '=', 'm_stok.IdBarang')
        ->get();

        return view('stok.index', [
            'stok' => $stok
        ]);
    }
}
