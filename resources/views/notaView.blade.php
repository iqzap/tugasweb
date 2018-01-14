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
    <script>
   
</script>
  <body>
    <!--Import jQuery before materialize.js-->


    <script type="text/javascript" src="{{ asset('jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <div class="container">
      <div class="row">
        <div class="col s12 l12">
          <h4>Nota Pembayaran</h4>
          <!--Tabel-->
              <div class="container">
                <div class="row">
                  <div class="col s12 l12">
                    <span>{{Auth::user()->name}} | {{$lokasi}} | {{date("Y-m-d H:i:s")}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l12">
                    <table class="striped centered responsive">
                      <thead>
                        <tr>
                            <th>Pesanan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                      </thead>

                      <tbody>
                        <!--Barang in List-->
                          <?php $total = 0;?>
                          @foreach($data as $index=>$barang)
                        <tr>
                          <?php $total += $barang->harga_barang_nota; ?>
                          <td>{{$barang->nama_barang_nota}}</td>
                          <td>{{$barang->jumlah_barang_nota}}</td>
                          <td>{{$barang->harga_barang_nota}}</td>
                        </tr>
                          <?php $uuid = $barang->id_pesanan_nota;?>
                          @endforeach
                        <tr>
                          <td colspan="2">Total Bayar</td>
                          <td>{{$total}}</td>
                        </tr>
                        <!--Barang in List-->
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 l12">
                    <a id="form-nota" class="waves-effect waves-light btn-large left" href="{{route('home')}}">Kembali</a>
                    <a id="submit" class="waves-effect waves-light btn-large right" href="{{route('cetak_nota',$uuid)}}"><i class="material-icons">print</i></a>
                  </div>
                </div>
              </div>
              <!--Tabel-->
        </div>
      </div>
    </div>
    
  </body>
    
</html>