<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_kasir;
class kasir extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $dataKasir = tb_kasir::all();
        return view('viewKasir',compact('dataKasir','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputDataKasir');
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
                'noIdentitas' => 'required|numeric',
                'nama' => 'required|max:35',
                'alamat' => 'required',
                'jenisKelamin' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ],[
                'nama.required'=>'Kolom nama harus berisi data',
                'nama.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $kasir = new tb_kasir();
        $kasir->no_identitas = $request->noIdentitas;
        $kasir->nama = $request->nama;
        $kasir->alamat = $request->alamat;
        $kasir->jenis_kelamin = $request->jenisKelamin;
        $kasir->email = $request->email;
        $kasir->password = $request->password;
        $kasir->save();

        return redirect('kasir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        return view('inputDataBarang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tb_kasir::find($id);
        return view('editDataKasir',compact('data')); 
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
                'noIdentitas' => 'required|numeric',
                'nama' => 'required|max:35',
                'alamat' => 'required',
                'jenisKelamin' => 'required',
                'email' => 'required',
            ],[
                'nama.required'=>'Kolom nama harus berisi data',
                'nama.max'=>'Maximal huruf yang di input adalah 35 huruf'
            ]);
        $kasir = tb_kasir::find($id);
        $kasir->no_identitas = $request->noIdentitas;
        $kasir->nama = $request->nama;
        $kasir->alamat = $request->alamat;
        $kasir->jenis_kelamin = $request->jenisKelamin;
        $kasir->email = $request->email;
        $kasir->save();

        return redirect('kasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=tb_kasir::find($id);
        $data->delete();
        return redirect('kasir');

    }
}
