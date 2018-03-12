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
<body class="grey lighten-4">
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
                    <li class="white-text active-li"><a class="white-text" href="/project_prognet/public/"><i class="small material-icons white-text">home</i>Dashboard</a></li>

                    <li class="white-text"><a class="white-text" href="/project_prognet/public/nota"><i class="small material-icons white-text">local_grocery_store</i> Penjualan</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/kasir"><i class=" small material-icons white-text">account_box</i>Pegawai</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/barang"><i class="small material-icons white-text">local_offer</i>Barang</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/pembeli"><i class="small material-icons white-text">assignment_ind</i>Member</a></li>
                                        
                </ul>
            </div>
            <!--End Left Nav-->
<div id="main">
        <section id="content">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h4 class="header-color-text center">Data Toko</h4>
                </div>
            </div>
            <div class="row white">
                <!--Start Header Content-->
                <div class="row">
                    <div class="col s6 m6 l6">
                        <table>
                            <tr>
                                <td>Jumlah Pegawai</td>
                                <td>:</td>
                                <td>
                                    {{$jumlahPegawai}}
                                </td>
                                <td><a href="/project_prognet/public/kasir">Detail</a></td>
                            </tr>
                            <tr>
                                <td>Jumlah Member</td>
                                <td>:</td>
                                <td>
                                    {{$jumlahMember}}
                                </td>
                                <td><a href="/project_prognet/public/pembeli">Detail</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->
            </div>
            <div >
                <!--Start Table Content-->
                <div id="table-content">              
                    <!--Start Room Number Input-->
                    <div class="col s12 m12 l12 white " >
                            <form class="col s12">
                            {{ csrf_field() }}  
                                <div class="row white" style="margin-bottom: 0px;">
                                    <div class="input-field col s6 ">
                                        <h5><p class="center">Data Barang Terjual</p></h5>
                                        <table class="striped" style="margin-top: 20px; margin-bottom: 50px;">
                                            <thead class="border-bottom-table teal lighten-2" >
                                                <th class="border-right-table">Nama Barang</th>
                                                <th class="border-right-table">Jumlah Terjual</th>
                                                <th class="border-right-table">Satuan</th>              
                                            </thead>
                                            <tbody>
                                            @foreach($dataBarangTerjual as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$data->nama_barang}}</td>
                                                    <td class="border-right-table">{{$data->jumlah}}</td>
                                                    <td class="border-right-table">{{$data->nama}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        
                                        <!-- ////////// isi-->
                                    </div>
                                    <div class="input-field col s6">
                                        <h5><p class="center">Data Barang Tersedia</p></h5>
                                        <table class="striped" style="margin-top: 20px; margin-bottom: 50px;">
                                            <thead class="border-bottom-table teal lighten-2" >
                                                <th class="border-right-table">Nama Barang</th>
                                                <th class="border-right-table">Jumlah Tersedia</th>
                                                <th class="border-right-table">Satuan</th>              
                                            </thead>
                                            <tbody>
                                            @foreach($dataBarangTersedia as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$data->nama_barang}}</td>
                                                    <td class="border-right-table">{{$data->jumlah}}</td>
                                                    <td class="border-right-table">{{$data->tb_satuan->nama}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        
                                        <!-- ////////// isi-->
                                    </div>
                                </div>
                                
                            </form>
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