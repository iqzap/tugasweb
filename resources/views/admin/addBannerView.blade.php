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
              <li class="divider"></li>
                <li></li>
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

      <!--Tabel Barang-->
      <div class="container">
        <div class="row">
          <div class="col s12 l12">
            <table class="highlight centered responsive">
              <thead>
                <tr>
                    <th>Foto Item</th>
                    <th>Nama</th>
                    <th>Stock</th>
                    <th>ID</th>
                    <th colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>
                <!--Barang in List-->
                  @foreach($data as $index=>$nota)
                <tr>
                  <td><img style="width: 200px; height: auto;" src="images/office.jpg"></td>
                  <td>{{$barang->nama_barang}}</td>
                  <td>{{$barang->jumlah_barang}}</td>
                  <td>{{$barang->id_barang}}</td>
                </tr>
                  @endforeach
                <!--Barang in List-->
               
              </tbody>
            </table>
          </div>
        </div>
          
          <hr>
          <div class="col s12 l12 pagination">
        {{$data->links()}}
    </div>
        <div class="col s12 l12">
          
          <a class="waves-effect waves-light btn-large right" href="{{route('admin.addView')}}">Tambah data</a>
        </div>
      </div>
      <!--Tabel Barang-->
      
    </div>
  </body>
</html>