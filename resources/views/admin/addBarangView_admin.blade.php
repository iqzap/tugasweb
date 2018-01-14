<!DOCTYPE html>
<html>
  <head>
   <!--Import Google Icon Font-->
    <link href="{{ asset('css/material-icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
      }
    </style>

  </head>
  <body>
    <!--Import jQuery before materialize.js-->


  <script type="text/javascript" src="{{ asset('jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <div class="col s12">
        <script type="text/javascript">
          $(document).ready(
            function(){
              $(".button-collapse").sideNav();
              $(".dropdown-button").dropdown();
              
            }
          );
        </script>
      
      <!--navbar-->
        <nav>
          <div class="nav-wrapper">
            <a href="#!" style="padding-left: 20px; padding-top: 5px;" class="brand-logo"><img src="{{asset('desain/logo.png')}}" alt="logo"></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

            <!--navbar web-size-->

            <!--Dropdown-->
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="#!">Sign In as Admin</a></li>
              <li class="divider"></li>
              <li><a href="{{route('logout_admin')}}"><i class="material-icons">exit_to_app</i>Log Out</a></li>
            </ul>
            <!--Dropdown-->

           <ul class="right hide-on-med-and-down">
              <li><a href="{{route('admin.tabel')}}"><i class="material-icons left">local_mall</i>Barang</a></li>
              <li><a href="{{route('admin.user')}}"><i class="material-icons left">people</i>User</a></li>
              <li><a href="{{route('admin.statistik')}}"><i class="material-icons left">timeline</i>Statistik</a></li>
              <li><a href="{{route('admin.banner')}}"><i class="material-icons left">photo_size_select_actual</i>Transaksi</a></li>
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Agus<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <!--navbar web-size-->

            <!--navbar mobile-size-->
            
            <!--navbar mobile-size-->
          </div>
        </nav>
      <!--navbar-->
      <br> <br>

      <!--Form addUser-->
      <div class="container">
        <div class="row">
        <div class="col s12 l3"></div>
        <div class="col s12 l4 input-field">
        	<div class="card">
        		<div class="container">
        			<br>	
        			<form method="POST" action="{{route('admin.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" >
                        {{ csrf_field() }}
        						<div class="input-field col s12 l12">
						          <h3>Tambah Barang</h3>
						          <br>	
										    </div>
        				<div class="row">
        						<div class="input-field col s12 l12">
						          <input id="id_barang" name="id_barang" type="text" class="validate" placeholder="ID Barang">
										  
										    </div>
										   </div>
										   <div class="row">
        						<div class="input-field col s12 l12">
										      <input id="nama_barang" name="nama_barang" type="text" class="validate" placeholder="Nama Barang">
										    
										   		</div>
										   </div>
										   <div class="row">
        						<div class="input-field col s12 l12">
										      <input id="harga_barang" name="harga_barang" type="text" class="validate" placeholder="Harga">
										      
										   		</div>
										   </div>
										   <div class="row">
        						<div class="input-field col s12 l12">
										      <input id="jumlah_barang" name="jumlah_barang" type="text" class="validate" placeholder="Jumlah">
										      
										     </div>
										   </div>
										   <div class="row">
        						<div class="file-field input-field">
											      <div class="btn">
											        <span>Browse</span>
											        <input type="file" id="gambar" name="gambar" >
											      </div>
											      <div class="file-path-wrapper">
											        <input class="file-path validate" placeholder="Upload Gambar">
											      </div>
											    </div>
										   </div>
										   
										   	<input type="submit" class="btn waves-effect waves-light btn-large" style="width: 100%;" value="Tambahkan">
						     </form>
                     
                    </div>
        	</div>
        </div>
        <div class="col s12 l3">.</div>
       </div>
      </div>
      <!--Form addUser-->

      </div>
  </body>
</html>