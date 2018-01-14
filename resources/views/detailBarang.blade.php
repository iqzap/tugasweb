@extends('layouts.navbar') @section('content') 
    <!--Import jQuery before materialize.js-->

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
        <script type="text/javascript" src="{{ asset('jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <div class="col s12">
        <script type="text/javascript">
          $(document).ready(
            function(){
            }
          );
          
          $('#modal1').modal('open');
          $('#modal1').modal('close');
          
          
          //Increase-Decrease
          function increaseValuex() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
          }

          function decreaseValuex() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
          }
            
            var $toastContent = $('<span>I am toast content</span>').add($('<button class="btn-flat toast-action">Undo</button>'));
        </script>
      @if($success = Session::get('success'))
    
    @endif
      <br><br><br>
        <a class="btn" id="toast" onclick="Materialize.toast('I am a toast', 4000)" style="display:none;">Toast!</a>
      <!--Detail Item-->
        @foreach($data as $index=>$barang)
        <?php $id = $barang->id_barang;?>
      <div class="container">
        <div class="row">
          <div class="col s12 l6">
            <div class="card">
              <div class="card-image">
                <img src="{{asset('gambar_barang/' . $barang->gambar)}}">
              </div>
              <div class="card-content">
                <p>{{ $barang->deskripsi }}.</p>
              </div>
              <div class="card-action">
                <span>Stock : {{$barang->jumlah_barang}}</span>
              </div>
            </div>
          </div>
          <div class="col s12 l6">
            <a class="waves-effect waves-light btn grey" href="{{route('home')}}">Kembali</a><br>
            <h3>{{$barang->nama_barang}}</h3>
            <hr>
            <h5>Rp {{$barang->harga_barang}}</h5>
            <br>
              <form method="post" action="{{route('isi_keranjang', $id)}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
            <div class="col s6 l4">
                <input type="number" id="number" name="number" value="0" />
                <div class="waves-effect waves-light btn" id="decrease" onclick="decreaseValuex()" value="Decrease Value">-</div>
                <div class="waves-effect waves-light btn" id="increase" onclick="increaseValuex()" value="Increase Value">+</div>
            </div>
                <input type="submit" value="Tambahkan" class="waves-effect waves-light btn-large" >
              </form>
            
          </div>
        </div>
      </div>
        @endforeach
      <!--Detail Item-->
      <!--...-->
    </div>
    <br>
  @endsection