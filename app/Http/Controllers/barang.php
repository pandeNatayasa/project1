<?php

namespace App\Http\Controllers;

use App\tb_barang;
use App\tb_satuan;
use App\tb_kategori;
use Illuminate\Http\Request;

class barang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBarang = tb_barang::with('tb_satuan')->with('tb_kategori')
        ->get();
        
        return view('viewBarang',compact('dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = tb_satuan::all();
        $kategori = tb_kategori::all();
        return view('inputDataBarang',compact('satuan','kategori'));
    }

     public function createSatuan()
    {
        return view('inputSatuan');
    }

    public function storeSatuan(Request $request)
    {
        $this->validate($request,[
                'namaSatuan' => 'required'
            ]);
        $satuan = new tb_satuan();
        $satuan->nama = $request->namaSatuan;
        $satuan->save();

        return redirect('barang');
    }

     public function createKategori()
    {
        return view('inputDataKategori');
    }

    public function storeKategori(Request $request)
    {
        $this->validate($request,[
                'namaKategori' => 'required'
            ]);
        $kategori = new tb_kategori();
        $kategori->nama_kategori = $request->namaKategori;
        $kategori->save();

        return redirect('barang');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'namaBarang' => 'required|max:35',
                'jumlahBarang' => 'required|numeric',
                'namaSatuan' => 'required',
                'namaKategori' => 'required',
                'harga' => 'required',
            ],[
                'namaBarang.required'=>'Kolom nama harus berisi data',
                'namaBarang.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $barang = new tb_barang();
        $barang->nama_barang = $request->namaBarang;
        $barang->jumlah = $request->jumlahBarang;
        $barang->harga = $request->harga;
        $barang->id_satuan = $request->namaSatuan;
        $barang->id_kategori = $request->namaKategori;
        $barang->save();

        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $satuan = tb_satuan::all();
        $kategori= tb_kategori::all();
        return view('inputDataBarang',compact('satuan','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tb_barang::find($id);
        $satuan= tb_satuan::all();
        $kategori= tb_kategori::all();
        return view('editBarang',compact('data','satuan','kategori')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                'namaBarang' => 'required|max:35',
                'jumlahBarang' => 'required|numeric',
                'namaSatuan' => 'required',
                'namaKategori' => 'required',
                'harga' => 'required',
            ],[
                'nama.required'=>'Kolom nama harus berisi data',
                'nama.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $barang = tb_barang::find($id);
        $barang->nama_barang = $request->namaBarang;
        $barang->jumlah = $request->jumlahBarang;
        $barang->harga = $request->harga;
        $barang->id_satuan = $request->namaSatuan;
        $barang->id_kategori = $request->namaKategori;
        $barang->save();

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=tb_barang::find($id);
        $data->delete();
        return redirect('barang');
    }
}
