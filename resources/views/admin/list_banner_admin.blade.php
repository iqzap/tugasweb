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
       @include('layouts.admin_navbar')
      <!--navbar-->

      <!--Tabel Barang-->
      <div class="container">
        <div class="row">
          <div class="col s12 l12">
            <table class="highlight centered responsive">
              <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>ID Pemesan</th>
                    <th>Total Harga</th>
                    <th>Lokasi</th>
                    <th>Waktu Pesan</th>
                    <th>Status</th>
                    
                </tr>
              </thead>

              <tbody>
                <!--Barang in List-->
                  @foreach($data as $index=>$nota)
                <tr>
                  <td>{{$nota->id_pesanan}}</td>
                  <td>{{$nota->id_user}}</td>
                  <td>{{$nota->total_harga}}</td>
                    <td>{{$nota->lokasi}}</td>
                    <td>{{$nota->created_at}}</td>
                    @if($nota->status == 0)
                        <td>
                            <a class="btn waves-effect waves-light red" href="{{route('ganti_status', $nota->id_pesanan)}}">Belum Terkirim</a></td>
                    @else
                        <td>Sudah Terkirm</td>
                    @endif
                </tr>
                  @endforeach
                <!--Barang in List-->
               
              </tbody>
            </table>
          </div>
        </div>
          
          <hr>
          <div class="col s12 l12 pagination">
    </div>
        
      </div>
      <!--Tabel Barang-->
      
    </div>
      @include('layouts.admin_footer')
  </body>
</html>