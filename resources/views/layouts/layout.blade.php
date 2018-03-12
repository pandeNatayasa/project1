<!DOCTYPE html>
<html>
<head>
	<title>CRUD - @yield('title')</title>
	<link href="{{asset('material/material-design-icons/css/material-icons.css')}}" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/materialize.min.css')}}"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/style.css')}}"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('material/materialize/css/myStyle.css')}}"  media="screen,projection"/>
	<style type="text/css">
		.*{
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<body class="grey lighten-4">
	<header class="top-nav nav-background margin margin-on-med-and-down">
		<div class="row">
			<div class="col s12 m12 l12" style="margin-bottom: 20px">
				<a href="#" class="header-color-text center" ><h5> SELAMAT DATANG di Toko Makmur</h5></a>
				
			</div>
		</div> 
			
	</header>
	
	<!--start content -->
	<div id="main">
		<section id="content">
			<div class="container-main">

				@yield('content')

			</div>
		</section>
	</div>

	<footer class="page-footer nav-background" style="margin-top: 350px;">
		<div class="container-main margin-on-med-and-down">
			<h7 class="black-text "><center> copyright@2017 </center></h7>
		</div>
	</footer>
	<script type="text/javascript" src="{{asset('material/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('material/materialize/js/materialize.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
            $('select').material_select();
        });
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 100, // Transition out duration
            startingTop: '4%', // Starting top style attribute
            endingTop: '10%', // Ending top style attribute
            }
        );

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