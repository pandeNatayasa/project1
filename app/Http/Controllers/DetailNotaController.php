<?php

namespace App\Http\Controllers;

use App\detail_nota;
use App\tb_barang;
use App\tb_satuan;
use App\tb_nota;
use App\tb_kasir;
use App\tb_detail_nota;
use App\tb_kategori;
use App\tb_pembeli;
use DB;
use Illuminate\Http\Request;

class DetailNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function dashboard(){
        $dataBarangTerjual = DB::table('tb_detail_notas')
        ->join('tb_barangs','tb_barangs.id','=','tb_detail_notas.id_barang')
        ->join('tb_satuans','tb_barangs.id_satuan','=','tb_satuans.id')
        ->select('tb_barangs.nama_barang','tb_satuans.nama',DB::raw('SUM(tb_detail_notas.jumlah_barang) AS jumlah'))
        ->groupBy(DB::raw('tb_detail_notas.id_barang'),'tb_satuans.nama','tb_barangs.nama_barang')
        ->get();

        //$idBarang=$dataBarangTerjual->id_barang;
        //$dataBarang=tb_barang::with('tb_satuan')->find($idBarang);
        $jumlahPegawai=DB::table('tb_kasirs')->count();

        $jumlahMember=DB::table('tb_pembelis')->count();

        /*SELECT SUM(tb_detail_notas.`jumlah_barang`) AS jumlah, tb_barangs.`nama_barang`,tb_satuans.`nama` AS namaSatuan
FROM tb_detail_notas
INNER JOIN tb_barangs ON tb_barangs.`id`=tb_detail_notas.`id_barang`
INNER JOIN tb_satuans ON tb_barangs.`id_satuan`=tb_satuans.`id`
GROUP BY tb_detail_notas.`id_barang`;

SELECT COUNT(tb_pembelis.`id`) AS jumlah FROM tb_pembelis;

SELECT COUNT(tb_kasirs.`id`) AS jumlah FROM tb_kasirs;
*/
        $dataBarangTersedia = tb_barang::with('tb_satuan')->with('tb_kategori')
        ->get();
        return view('home',compact('dataBarangTersedia','dataBarangTerjual','jumlahPegawai','jumlahMember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataBarang = tb_barang::all();

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
                'noNota' => 'required|max:35',
                'namaBarang' => 'required',
                'jumlah' => 'required',
            ]);
        $idBarang=$request->namaBarang;

        $dataJumlahBarang=tb_barang::find($idBarang);
        $jumlahBarang=$request->jumlah;
        if($dataJumlahBarang->jumlah >= $jumlahBarang){
            $dataDetail = new tb_detail_nota();
            $dataDetail->id_nota = $request->noNota;
            $dataDetail->id_barang = $request->namaBarang;
            $dataDetail->jumlah_barang = $request->jumlah;
            $dataDetail->save();

            
            //update stok barang
            
            $jumlah=$request->jumlah;
            $dataBarang=tb_barang::find($idBarang);
            $stok=$dataBarang->jumlah;
            $stokSisa=$stok-$jumlah;
            $dataBarang->jumlah=$stokSisa;
            $dataBarang->save();

            return redirect()->route('nota.show',$dataDetail->id_nota);
        }else{
            //$id_nota=$request->noNota;
            //return redirect()->route('nota.show',$id_nota)->with('Maaf stok barang kurang, jumlah barang yang tersedia : '.$dataJumlahBarang->jumlah);
            return('Maaf stok barang kurang, jumlah barang yang tersedia : '.$dataJumlahBarang->jumlah);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\detail_nota  $detail_nota
     * @return \Illuminate\Http\Response
     */
    public function show(detail_nota $detail_nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_nota  $detail_nota
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_nota $detail_nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_nota  $detail_nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $dataNota= tb_nota::find($id);
        $dataNota->total_harga=$request->totalharga;
        $dataNota->save();
        return redirect()->route('nota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_nota  $detail_nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=tb_detail_nota::find($id);
        $idNota=DB::table('tb_detail_notas')
        ->select('tb_detail_notas.id_nota')
        ->where('tb_detail_notas.id','=',$id)
        ->get();
        $data->delete();
        return redirect()->route('nota.show',$data->id_nota);
    }
}
