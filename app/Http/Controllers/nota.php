<?php

namespace App\Http\Controllers;

use App\tb_barang;
use App\tb_satuan;
use App\tb_nota;
use App\tb_kasir;
use App\tb_detail_nota;
use App\tb_kategori;
use App\tb_pembeli;
use DB;
use Illuminate\Http\Request;

class nota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no=1;
        $dataNota =tb_nota::with('tb_pembeli')->with('tb_kasir')
        ->get();

        $dataPembeli=tb_pembeli::all();
        $dataKasir=tb_kasir::all();
    
        return view('viewNota',compact('dataNota','no','dataPembeli','dataKasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataBarang=tb_barang::all()->where('jumlah','>','0');
        $dataPembeli=tb_pembeli::all();
        $dataKasir=tb_kasir::all();
        return view('inputNota',compact('dataBarang','dataPembeli','dataKasir'));
    }
    public function crateBarang($id){
        $dataBarang=tb_barang::all()->where('jumlah','>','0');
        return view('beliBarang',compact('dataBarang','id'));
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
                'tanggalNota' => 'required|max:35',
                'namaKasir' => 'required|numeric',
                'namaPembeli' => 'required'
            ]);
        $tanggal=$request->tanggalNota;
        $tanggal1= date('Y-m-d',strtotime($tanggal));

        $harga=0;
        $data=new tb_nota();
        $data->id_pembeli = $request->namaPembeli;
        $data->id_kasir = $request->namaKasir;
        $data->tanggal = $tanggal1;
        $data->total_harga=$harga;
        $data->save();

        return redirect('nota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $no=1;
        $dataBarang=tb_barang::all()->where('jumlah','>','0');;
        $dataNota =tb_nota::find($id);
        $dataNotaBarang=tb_detail_nota::all()
        ->where('id_nota','=',$id);
        $barang=tb_barang::with('tb_satuan')->get();
        $datasatuan=tb_satuan::all(); 

        //$dataNotaBarang=DB::table('tb_detail_notas')
        //->join('tb_barangs','tb_detail_notas.id_barang','=','tb_barangs.id')
        //->join('tb_satuans','tb_barangs.id_satuan','=','tb_satuans.id')
        //->where('tb_detail_notas.id_nota','=',$id)
        //->get();
        return view('viewDetailNota',compact('dataNota','no','dataNotaBarang','dataBarang','datasatuan','barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataBarang=tb_barang::all();
        return view('beliBarang',compact('dataBarang','id'));
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
        $dataNota= tb_nota::find($id);
        $dataNota->total_harga=$request->totalharga;
        $dataNota->save();
        return redirect('nota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=tb_nota::find($id);
        $data->delete();
        $dataDetail=tb_detail_nota::where('tb_detail_notas.id_nota','=',$id);
        $dataDetail->delete();
        return redirect('nota');
    }

    
}
