@extends('layouts.layout')

@section('title')
    mahasiswa
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

<div class="modal" id="modal3">
    <div class="row white">
    <div class="modal-content">
        <!--Start Header Content-->
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Input Nota</h3>
                    </div>
                </div>
                <!--End Header Content-->
    </div>
    <div class="modal-footer">
                            <!--Start Room Number Input-->
                    <div class="col s12 m12 l12 white " style="margin-top: 30px; margin-bottom: 50px;">
                            <form class="col s12" method="POST" action="{{ action('nota@store') }}">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col s5">
                                        <div>
                                            <div class="row">
                                                <div class="col s2">
                                                    Tanggal   
                                                </div>
                                                <div class="col s10">
                                                    <input type="text" name="tanggalNota" class="datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col s2">
                                                    Kasir 
                                                </div>
                                                <div class="col s10">
                                                    <select id="namaKasir" name="namaKasir">
                                                        <option value="" disabled selected>Choose your option</option>
                                                        @foreach($dataKasir as $nama)
                                                            <option value="{{$nama->id}}">{{$nama->nama}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div>   
                                        </div>        
                                    </div>
                                    <div class="col s7" style="display: inline-block;">
                                        <div class="col s1"></div>
                                        <div class="col s3">
                                           Nama Pembeli 
                                        </div>
                                        <div class="col s8">
                                            <select id="namaPembeli" name="namaPembeli">
                                                <option value="" disabled selected>Choose your option</option>
                                                @foreach($dataPembeli as $nama)
                                                    <option value="{{$nama->id}}">{{$nama->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row " >
                                    <div class="input-field col s12">
                                        <div class="row">
                                            <div class="col s2"></div>
                                            <div class="col s10"><button type="submit"  class="btn waves-effect waves-light side-nav-background " name="submit" value="submit">Submit</button></div>
                                        </div> 
                                        <!-- ////////// isi-->
                                    </div>
                                </div>
                            </form>
                    </div>
    </div>
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
<div id="main">
        <section id="content">
            <div class="row white">
                
                <!--Start Header Content-->
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h3 class="header-color-text center">Data Nota</h3>
                    </div>
                </div>
                <!--End Header Content-->
                <!--////////////////////////////////////////////////////////////-->

                <!--Start Table Content-->
                <div id="table-content"> 
                <div class="row col s12" style="margin-bottom:10px;">
                        <div class="col s12 m12 l12 white">
                            <a class="btn waves-effect waves-light side-nav-background modal-trigger" data-target="modal3"  >Tambah Nota</a>
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
                                                <th class="border-right-table">No</th>
                                                <th class="border-right-table">Nama Pembeli</th>
                                                <th class="border-right-table">Nama Kasir</th>
                                                <th class="border-right-table">Tanggal</th>
                                                <th class="border-right-table">Total Harga</th>
                                                <th > Action</th>               
                                            </thead>
                                            <tbody>
                                            @foreach($dataNota as $data )
                                                <tr>
                                                    <td class="border-right-table">{{$no++}}</td>
                                                    <td class="border-right-table">{{$data->tb_pembeli->nama}}</td>
                                                    <td class="border-right-table">{{$data->tb_kasir->nama}}</td>
                                                    <td class="border-right-table">{{$data->tanggal}}</td>
                                                    <td class="border-right-table" style="text-align: right;">Rp. {{$data->total_harga}},00</td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light side-nav-background" href="{{ action('nota@show',$data->id) }}">View</a>
                                                        
                                                        <a type="submit" name="name" class="btn red waves-light side-nav-background modal-trigger" data-target="modal1" >delete</a>    
                                                        
                                                        <div class="modal" id="modal1">
                                                            <div class="modal-content">
                                                                <div class="row">
                                                                    <p>Apakah Anda Yakin ingin menghapus data ini ?</p>
                                                                </div> 
                                                            </div>
                                                            <div class="modal-footer" style="margin-bottom: 20px;">
                                                                <div class="row">
                                                                    <form action="{{action('nota@destroy',$data->id)}}" method="POST">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="_method" value="delete">
                                                                        <button type="submit" name="name" class="btn red waves-light side-nav-background" >delete</button>    
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!--<button class="btn red waves-light side-nav-background" type="button" onclick="deletemember({{$data->id}})">delete</button>-->
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
    <script type="text/javascript" src="{{asset('material/js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('material/materialize/js/materialize.min.js')}}"></script>
    <script type="javascript">
        $(document).ready(function() {
            $('select').material_select();
            alert('hello');
        });

        function deletemember(id){
            $('#formdelete').attr('action','/nota/'+id);
            $('#modal2').modal('show');
        }
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

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
    </script>
</body>
</html>
@endsection