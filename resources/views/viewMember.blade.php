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

                    <li class="white-text "><a class="white-text" href="/project_prognet/public/nota"><i class="small material-icons white-text">local_grocery_store</i> Penjualan</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/kasir"><i class=" small material-icons white-text">account_box</i>Pegawai</a></li>
                    
                    <li><a class="white-text" href="/project_prognet/public/barang"><i class="small material-icons white-text">local_offer</i>Barang</a></li>
                    
                    <li><a class="white-text active-li" href="/project_prognet/public/pembeli"><i class="small material-icons white-text">assignment_ind</i>Member</a></li>
                                        
                </ul>
            </div>
            <!--End Left Nav-->
<div id="main">
        <section id="content">
            <div class="row white">
                
                <!--Start Header Content-->
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Data Member</h3>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->

                <!--Start Table Content-->
                <div id="table-content"> 
                <div class="row col s12" style="margin-bottom:10px;">
                        <div class="col s12 m12 l12 white">
                            <a class="btn waves-effect waves-light side-nav-background" href="{{ action('pembeli@create')}}" >Tambah Data Member</a>
                            
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
                                                <th class="border-right-table">Nama</th>
                                                <th class="border-right-table">Alamat</th>
                                                <th class="border-right-table">No Telepon</th>
                                                <th > Action</th>               
                                            </thead>
                                            <tbody>
                                            @foreach($dataMember as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$data->nama}}</td>
                                                    <td class="border-right-table">{{$data->alamat}}</td>
                                                    <td class="border-right-table">{{$data->no_telp}}</td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light side-nav-background" href="{{ action('pembeli@edit',$data->id) }}">Edit</a>
                                                        <a type="submit" name="name" class="btn red waves-light side-nav-background modal-trigger" data-target="modal1" value="delete">delete</a>    
                                                        
                                                        <div class="modal" id="modal1">
                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <p>Apakah Anda Yakin ingin menghapus data ini ?</p>
                                                                </div> 
                                                            </div>
                                                            <div class="modal-footer" style="margin-bottom: 20px;">
                                                                <div class="row">
                                                                    <form action="{{action('pembeli@destroy',$data->id)}}" method="POST">
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