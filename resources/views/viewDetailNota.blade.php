@extends('layouts.layout')

@section('title')
    mahasiswa
@endsection

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="{{asset('material/material-design-icons/css/material-icons.css')}}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/materialize.min.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/style.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/myStyle.css')}}"  media="screen,projection"/>

</head>
<body>
<div id="modal1" class="modal">
            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Beli Barang</h3>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->

                <!--Start Table Content-->
                    <!--Start Room Number Input-->
                    <div class="col s12 m12 l12 white " style="margin-bottom: 80px;">
                            <form class="col s12" method="POST" action="{{route('detailnota.store') }}">
                            {{ csrf_field() }}
                            
                                <input type="hidden" name="noNota" value="{{$dataNota->id}}"> 
                            
                                <div class="row">
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s2">Barang</div>
                                            <div class="input-field col s9">
                                                <select id="namaBarang" name="namaBarang">
                                                    <option value="" disabled selected>Choose your option</option>
                                                    @foreach($dataBarang as $nama)
                                                        <option value="{{$nama->id}}">{{$nama->nama_barang}}</option>
                                                    @endforeach
                                                </select>
                                            </div> 
                                        </div>
                                           
                                    </div>
                                    <div class="col s6">
                                        <div class="row">
                                            <div class="col s2">Jumlah</div>
                                            <div class="input-field col s8"><input type="text" name="jumlah"></div>
                                        </div> 
                                    </div>
                                    
                                    
                                </div> 
                                <div class="row">
                                    <div class="col s2">
                                        <div class="col s5"><button type="submit"  class="btn waves-effect waves-light side-nav-background " name="submit" value="submit">submit</button></div>
                                    </div>
                                </div>
                                
                            </form>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">cancel</a>
            </div>
</div>
<!--Start Left Nav-->
            <div>
                <ul id="nav-mobile" class="side-nav fixed side-nav-background">
                    <li class="user-profile hide-on-med-and-down" style="margin-bottom:20px">
                        <div class="row">
                            <div class="col m11">
                                <div class="col s3"></div>
                                <div class="col s6 center">
                                    <a href="/project_prognet/public/" class="brand-logo"><img class="responsive-img" src="{{asset('material/shopping_cart.png')}}"></a>
                                </div>
                            </div>          
                            <div class="col m11">
                                <div class="col s12 center">
                                    <a href="/project_prognet/public/"><h4 class="header-color-text center white-text">Toko Makmur</h4></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="user-profile hide-on-med-and-down" style="margin-bottom:20px">
                        <div class="row">
                            <div class="col m2">
                                <div class="col s12 center">
                                    
                                </div>
                            </div>
                            <div class="col m9">
                                <div class="col s12 center">
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="white-text"><a class="white-text" href="/project_prognet/public/"><i class="small material-icons white-text">home</i>Dashboard</a></li>

                    <li class="white-text active-li"><a class="white-text" href="/project_prognet/public/nota"><i class="small material-icons white-text">local_grocery_store</i> Penjualan</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/kasir"><i class=" small material-icons white-text">account_box</i>Pegawai</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/barang"><i class="small material-icons white-text">local_offer</i>Barang</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/pembeli"><i class="small material-icons white-text">assignment_ind</i>Member</a></li>
                                        
                </ul>
            </div>
            <!--End Left Nav-->
 <!--////////////////////////////////////////////////////////////-->
<div id="main">
        <section id="content">
            <div class="row white">
                
                <!--Start Header Content-->
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Data Detail Nota</h3>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->

                <!--Start Table Content-->
                <div id="table-content"> 
                <div class="row col s12" style="margin-bottom:10px;">
                        <div class="col s12 m12 l12 white">
                            <a class="btn waves-effect waves-light side-nav-background modal-trigger" data-target="modal1" href="" >Tambah Barang</a>
                        </div>
                </div>

                    <!--Start Room Number Input-->
                    <div class="col s12 m12 l12 white " style="margin-bottom: 180px;">
                            <div class="col s12">
                            {{ csrf_field() }}
                                <div class="row">
                                
                                    <div class="col s6">
                                        <table class="input-field col s12">
                                            <tr >
                                               <td>Tanggal </td>
                                               <td ><input type="text" name="tanggalNota" readonly="" value=": {{$dataNota->tanggal}}"></td> 
                                            </tr>
                                            <tr>
                                               <td>Kasir </td>
                                               <td><input type="text" name="namaKasir" readonly="" value=": {{$dataNota->tb_kasir->nama}}"></td> 
                                            </tr>
                                            <tr>
                                               <td>No Nota </td>
                                               <td><input type="text" name="noNota" readonly="" value=": {{$dataNota->id}}"></td> 
                                            </tr>
                                        
                                        </table>
                                    </div>
                                    <div class="col s5" style="display: inline-block;">
                                        <table class="input-field col s12">
                                            <tr>
                                                <td>Nama Pembeli </td>
                                                <td ><input type="text" name="namaPembeli" readonly="" value=": {{$dataNota->tb_pembeli->nama}}"></td> 
                                            </tr> 
                                        </table>
                                        
                                    </div>
                                    
                                </div>  
                                <div class="row " >
                                    <div class="input-field col s12">
                                        <table class="striped border-bottom-table">
                                            <thead class="border-bottom-table teal lighten-2" >
                                                <th class="border-right-table">No</th>
                                                <th class="border-right-table">Kode Barang</th>
                                                <th class="border-right-table">Nama barang</th>
                                                <th class="border-right-table">Qty</th>
                                                <th class="border-right-table">Satuan</th>
                                                <th class="border-right-table">harga Satuan</th>
                                                <th class="border-right-table">Total</th>      
                                                <th class="border-right-table">Action</th>
                                            </thead>
                                            <tbody>
                                            <?php $TotalBayar=0 ?>
                                            @foreach($dataNotaBarang as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$no++}}</td>
                                                    <td class="border-right-table">{{$data->tb_barang->id}}</td>
                                                    <td class="border-right-table">{{$data->tb_barang->nama_barang}}</td>
                                                    <td class="border-right-table">{{$data->jumlah_barang}}</td>
                                                    <td class="border-right-table">{{$data->tb_barang->tb_satuan->nama}}</td>
        
                                                    <td class="border-right-table" style="text-align: right;">Rp. {{$data->tb_barang->harga}},00</td>
                                                    <?php 
                                                        $jmlh=$data->jumlah_barang;
                                                        $harga= $data->tb_barang->harga;
                                                        $total=$jmlh * $harga;
                                                        $TotalBayar=$TotalBayar+$total;
                                                    ?>
                                                    <td class="border-right-table" style="text-align: right;">Rp. {{$total}},00</td>
                                                    <td>
                                                        <!--<form   method="POST" style="display: inline-block;">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="delete">
                                                            <input type="submit" name="name" class="btn red waves-light side-nav-background" value="delete">    
                                                        </form>-->
                                                         <a type="submit" name="name" class="btn red waves-light side-nav-background modal-trigger" data-target="modal2" >delete</a>    
                                                        
                                                        <div class="modal" id="modal2">
                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <p>Apakah Anda Yakin ingin menghapus data ini ?</p>
                                                                </div> 
                                                            </div>
                                                            <div class="modal-footer" style="margin-bottom: 20px;">
                                                                <div class="row">
                                                                    <form action="{{route('detailnota.destroy',$data->id) }}" method="POST">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="_method" value="delete">
                                                                        <button type="submit" name="name" class="btn red waves-light side-nav-background" >delete</button>    
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><p>Total Bayar </p></td>
                                                    <td><p>: Rp. {{$TotalBayar}},00</p></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <!-- ////////// isi-->
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                
                                    <form method="POST" action="{{action('nota@update',$dataNota->id)}}">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}
                                        <div class="col s7"></div>
                                        <div class="col s3">
                                            <input type="hidden" name="totalharga" value="{{$TotalBayar}}">
                                        </div>
                                        <div class="col s2">
                                            <button type="submit" class="btn waves-effect waves-light side-nav-background" name="submit" value="submit">simpan</button>
                                        </div>
                                    </form>
                                  
                            </div>
                    </div>
                    
                    
                    <!--End Room Number Input-->
                    <!--////////////////////////////////////////////////////////////-->
                </div>
                <!--End Table Content-->
            </div>
        </section>
    </div>

    <script type="text/javascript" src="{{asset('material/js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('material/materialize/js/materialize.min.js')}}"></script>
    <script type="javascript">
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 100, // Transition out duration
            startingTop: '4%', // Starting top style attribute
            endingTop: '10%', // Ending top style attribute
            }
        );

        $(document).ready(function() {
            $('select').material_select();
            alert('hello');
        });
        function deletemember(id){
            $('#formdelete').attr('action','/nota/'+id);
            $('#modal2').modal('show');
        }
    </script>
</body>
</html>
@endsection