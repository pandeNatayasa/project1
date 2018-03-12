<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_pembeli;

class pembeli extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMember = tb_pembeli::all();
        return view('viewMember',compact('dataMember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputDataMember');
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
                'nama' => 'required|max:35',
                'alamat' => 'required',
                'noTlp' => 'required',
            ],[
                'nama.required'=>'Kolom nama harus berisi data',
                'nama.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $pembeli = new tb_pembeli();
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_telp = $request->noTlp;
        $pembeli->save();

        return redirect('pembeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('inputDataMember');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tb_pembeli::find($id);
        return view('editDataMember',compact('data'));
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
                'nama' => 'required|max:35',
                'alamat' => 'required',
                'noTlp' => 'required',
            ],[
                'nama.required'=>'Kolom nama harus berisi data',
                'nama.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $pembeli = tb_pembeli::find($id);
        $pembeli->nama = $request->nama;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_telp = $request->noTlp;
        $pembeli->save();

        return redirect('pembeli');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=tb_pembeli::find($id);
        $data->delete();
        return redirect('pembeli');
    }
}
