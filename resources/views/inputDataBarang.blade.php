@extends('layouts.layout')

@section('title')
	Mahasiswa
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
				<!--Start Table Content-->
				<div id="table-content">
					<!--Start Data Mahasiswa Input-->
					<!--////////////////////////////////////////////////////////////-->
					<div class="col s12 m12 l12 padding-on-med-and-down " style="margin-left:70px;margin-right:70px;margin-bottom: 70px;">
						<!--Start Header Tabel-->
						<div class="row">
							<div class="col s12 m12 l12">
								<h3 class="header-color-text  center"> Input Data Barang</h3>
							</div>
						</div>
						<!--End Header Tabel-->
						<!--////////////////////////////////////////////////////////////-->
						<div class="row">
							<form class="col s12" method="POST" action="{{ action('barang@store') }}">
							{{ csrf_field() }}	
								<div class="row padding-on-med-and-down" style="margin-right:60px;margin-left:60px;">
									<div class="input-field col s12">
										<table width="60%">
											<tr>
												<td>Nama Barang</td>
												<td>
													<input type="text" name="namaBarang" >
													<span class="red-text">{{ $errors->first('namaBarang')}}</span>
												</td>
											</tr>
											<tr>
												<td>Jumlah Barang</td>
												<td>
													<input type="text" name="jumlahBarang" >
													<span class="red-text">{{ $errors->first('jumlahBarang')}}</span>
												</td>
											</tr>
											<tr>
												<td>Satuan</td>
												<td>
												<div class="input-field col s12">
													<select id="namaSatuan" name="namaSatuan">
														<option value="" disabled selected>Choose your option</option>
														@foreach($satuan as $nama)
															<option value="{{$nama->id}}">{{$nama->nama}}</option>
														@endforeach
													</select>
													<span class="red-text">{{ $errors->first('namaSatuan')}}</span>
												</div>
												 	
												</td>
											</tr>
											
											<tr>
												<td>Harga Satuan</td>
												<td>
													<input type="text" name="harga" >
													<span class="red-text">{{ $errors->first('harga')}}</span>
												</td>
											</tr>
											<tr>
												<td>Kategori</td>
												<td>
												<div class="input-field col s12">
													<select id="namaKategori" name="namaKategori">
														<option value="" disabled selected>Choose your option</option>
														@foreach($kategori as $nama)
															<option value="{{$nama->id}}">{{$nama->nama_kategori}}</option>
														@endforeach
													</select>
													<span class="red-text">{{ $errors->first('namaKategori')}}</span>
												</div>
												 	
												</td>
											</tr>
											<tr>
												<td></td>
												<td><input class="btn waves-effect waves-light side-nav-background" type="submit" name="submit" value="save"></td>
											</tr>
										</table>

									</div>
								</div>
							</form>
						</div>
					</div>
					<!--End Data Mahasiswa Input-->
					<!--////////////////////////////////////////////////////////////-->
				</div>
				<!--End Table Content-->
			</div>
		</section>
	</div>
	<script type="text/javascript" src="{{asset('material/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('material/materialize/js/materialize.min.js')}}"></script>
	<script type="javascript">
		$(document).ready(function() {
            $('select').material_select();
            alert('hello');
        });
	</script>
</body>
</html>
@endsection