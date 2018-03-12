@extends('layouts.layout')

@section('title')
    view barang
@endsection

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="material/material-design-icons/css/material-icons.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="material/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="material/materialize/css/style.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="material/materialize/css/myStyle.css"  media="screen,projection"/>
</head>
<body>
<!--Start modal satuan-->
<div class="modal" id="modal1">
    <div class="row white">
        <div class="modal-content">
            <div class="row white">
                <div class="col s12 m12 l12">
                    <h3 class="header-color-text center"> Input Data Satuan</h3>
                </div>
            </div>
        </div>
        <div class="modal-footer">
                <form method="POST" action="{{ action('barang@storeSatuan')}}">
                    {{ csrf_field() }}           
                    <div class="row white">
                        <div class="input-field col s12">
                            <div class="col s2"></div>
                            <div class="col s2" style="margin-bottom: 80px;">Nama Satuan</div>
                            <div class="col s6">
                                <input type="text" name="namaSatuan">
                                <span class="red-text">{{ $errors->first('namaSatuan')}}</span>
                            </div>
                        </div>
                    </div>
                        <div class="col s2" style="margin-bottom: 20px; "></div>
                        <div class="col s6"><button class="btn waves-effect waves-light">Save</button></div>
                        <div class="col s3"><a href="barang" class="btn waves-effect waves-light">Cancel</a></div>      
                </form>    
        </div>
    </div>
</div>
<!--End modal satuan-->
<!--start modal kategori-->
<div class="modal" id="modal2">
    <div class="row white">
        <div class="modal-content">
            <div class="row white">
                <div class="col s12 m12 l12">
                    <h3 class="header-color-text center"> Input Data Kategori</h3>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row white">         
                <form method="POST" action="{{ action('barang@storeKategori')}}">
                    {{ csrf_field() }}
                    <div class="row white">
                        <div class="input-field col s12">
                            <div class="col s2"></div>
                                <div class="col s2" style="margin-bottom: 80px;">Nama Kategori</div>
                                <div class="col s6">
                                    <input type="text" name="namaKategori">
                                    <span class="red-text">{{ $errors->first('namaKategori')}}</span>
                                </div>
                        </div>
                    </div>
                    <div class="col s2" style="margin-bottom: 20px; "></div>
                    <div class="col s6"><button class="btn waves-effect waves-light">Save</button></div>
                    <div class="col s3"><a href="barang" class="btn waves-effect waves-light">Cancel</a></div>      
                </form>
            </div>
        </div>
    </div>
</div>
<!--End modal kategori-->
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

                    <li class="white-text"><a class="white-text" href="/project_prognet/public/nota"><i class="small material-icons white-text">local_grocery_store</i> Penjualan</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/kasir"><i class=" small material-icons white-text">account_box</i>Pegawai</a></li>
                    
                    <li><a class="white-text active-li" href="/project_prognet/public/barang"><i class="small material-icons white-text">local_offer</i>Barang</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/pembeli"><i class="small material-icons white-text">assignment_ind</i>Member</a></li>
                                        
                </ul>
            </div>
            <!--End Left Nav-->
<div id="main">
        <section id="content">
            <div class="row white">
                
                <!--Start Header Content-->
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Data Barang</h3>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->

                <!--Start Table Content-->
                <div id="table-content"> 
                <div class="row col s12 " style="margin-bottom:10px;">
                        <div class="col s12 m12 l12 white">
                            <a class="btn waves-effect waves-light side-nav-background" href="{{ action('barang@create')}}" >Tambah Data Barang</a>
                            <a class="btn waves-effect waves-light side-nav-background modal-trigger" data-target="modal1" >Tambah Data Satuan</a>
                            <a class="btn waves-effect waves-light side-nav-background modal-trigger" data-target="modal2" style="display: inline-block;">Tambah Data Kategori</a>
                        </div>
                </div>
                
                    <!--Start Room Number Input-->
                    <div class="col s12 m12 l12 white " style="margin-bottom: 180px;">
                            <div class="col s12">
                            {{ csrf_field() }}  
                                <div class="row " >
                                    <div class="input-field col s12">
                                        <table class="striped">
                                            <thead class="border-bottom-table teal lighten-2" >
                                                <th class="border-right-table">Nama Barang</th>
                                                <th class="border-right-table">Jumlah Barang</th>
                                                <th class="border-right-table">Satuan</th>
                                                <th class="border-right-table">Harga</th>
                                                <th class="border-right-table">Kategori</th>
                                                <th > Action</th>               
                                            </thead>
                                            <tbody>
                                            @foreach($dataBarang as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$data->nama_barang}}</td>
                                                    <td class="border-right-table">{{$data->jumlah}}</td>
                                                    <td class="border-right-table">{{$data->tb_satuan->nama}}</td>
                                                    <td class="border-right-table" style="text-align: right;">Rp. {{$data->harga}},00</td>
                                                    <td class="border-right-table">{{$data->tb_kategori->nama_kategori}}</td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light side-nav-background" href="{{ action('barang@edit',$data->id) }}">Edit</a>
                                                        <!--<form action="{{ action('barang@destroy',$data->id) }}" method="POST" style="display: inline-block;">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="delete">
                                                            <input type="submit" name="name" class="btn red waves-light side-nav-background" value="delete">    
                                                        </form>-->
                                                         <a type="submit" name="name" class="btn red waves-light side-nav-background modal-trigger" data-target="modal4" >delete</a>    
                                                        
                                                        <div class="modal" id="modal4">
                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <p>Apakah Anda Yakin ingin menghapus data ini ?</p>
                                                                </div> 
                                                            </div>
                                                            <div class="modal-footer" style="margin-bottom: 20px;">
                                                                <div class="row">
                                                                    <form action="{{ action('barang@destroy',$data->id) }}" method="POST">
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
                                            </tbody>
                                        </table>
                                        
                                        <!-- ////////// isi-->
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                    
                    
                    <!--End Room Number Input-->
                    <!--////////////////////////////////////////////////////////////-->
                </div>
                <!--End Table Content-->
            </div>
        </section>
    </div>
    <script type="text/javascript" src="{{asset('material/js/jquery.min.js')}}"></script>
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
    </script>
</body>
</html>
@endsection