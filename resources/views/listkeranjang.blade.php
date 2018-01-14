@extends('layouts.navbar') @section('content')    
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <div class="col s12">
    <div class="container">
      <h4>Pesanan anda : </h4>
        <?php $total=0;?>
            <ul class="collection">
            @foreach($data as $index=>$barang)
              <li class="collection-item">
                <span class="title"><h5>{{$barang->nama_barang}}</h5></span>
                <a href="#!" class="secondary-content">Rp {{$barang->harga}}</a>
                <p>Jumlah : {{$barang->jumlah}}</p>
              </li>
            <?php $total += $barang->harga;?>
            @endforeach  
            </ul>
            <div class="row">
              <div class="col s12 l12">
                <form method="get" action="{{route('submit_keranjang', $total)}}">
                <div class="col s12 l9 input-field">
                  <input type="text" id="lokasi" name="lokasi" class="autocomplete" required>
                  <label for="lokasi">Lokasi</label>
                </div>
                <div class="col s12 l3">
                  <button class="btn waves-effect waves-light btn-large secondary-content" type="submit" name="action">Rp {{$total}}
                    <i class="material-icons right">send</i>
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
   @endsection