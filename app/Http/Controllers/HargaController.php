<?php

namespace App\Http\Controllers;

use App\Models\Harga;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HargaController extends Controller
{
    //
    public function index(){
        $harga = DB::table('m_harga')
        ->join('m_barang', 'm_barang.IdBarang', '=', 'm_harga.IdBarang')
        ->get();

        return view('harga.index', [
            'harga' => $harga
        ]);
    }

    public function create(){
        $barang = DB::table('m_barang')
        ->get();

        return view('harga.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $harga = new Harga();
        $harga->KodeBarang = $request->KodeBarang;
        $harga->HargaBarang = $request->HargaBarang;
        $harga->save();

        return response()->json(array('status' => 'success', 'reason' => 'Sukses Tambah Data'));

    }
}
