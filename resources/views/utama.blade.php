@extends('layouts.navbar') @section('content')
<link href="{{asset('css/material-icon.css')}}" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
<!--Let browser know website is optimized for mobile-->

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>
<div class="col s12">
    <!-- banner -->
    <img src="{{asset('desain/hoah2.jpg')}}" style="width:100%; height:auto;">
    <!-- banner -->
    <br><br>
</div>

<div class="container">

    <!--Produk Terlaris-->
    <span>Produk terlaris :
          @foreach($ranking as $index=>$terlaris)
          <div class="chip">{{$terlaris->nama_barang_nota}}</div>
          @endforeach
      </span>
    <br>
    <!--Produk Terlaris-->
    <center>
        <table>


            <thead class="row col sl12 l12">

                <td class="input-field">
                    <input type="text" name="search" id="search">
                    <label for="search">Pencarian</label></td>
                <td><a href="{{route('hasil_pencarian')}}" class="waves-effect waves-light btn-large">Cari</a></td>

            </thead>
            <tbody>

            </tbody>




        </table>

    </center>
    <div class="row">

        <div class="col s12"><br></div>
        <!--ITEM-->
        @foreach($data as $index=>$barang)
        <div class="col s12 l3">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset('gambar_barang/'. $barang->gambar) }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{$barang->nama_barang}}<i class="material-icons right">more_vert</i></span>
                    <p>Stock : <b>{{$barang->jumlah_barang}}</b></p>
                    <h4>Rp {{$barang->harga_barang}}</h4>
                    <br>
                </div>
                <span><a style="width: 100%;" class="waves-effect waves-light btn-large" href="{{route('detail_barang_view',  $barang->id_barang)}}">Beli</a></span>


                <!-- On click -->
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{$barang->nama_barang}}<i class="material-icons right">close</i></span>
                    <p>{{$barang->deskripsi}}</p>
                </div>
                <!-- On click -->
            </div>
        </div>
        @endforeach
        <!--ITEM-->


        <!--...-->
    </div>
    <br>
    <!--pagination-->
    <div class="col s12 l12 pagination">
        {{$data->links()}}
    </div>
    <!--pagination-->

    <!--keranjang-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div class="col s12">

        <!-- Button Keranjang -->
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a id="menu" class="btn btn-floating btn-large cyan pulse modal-trigger" href="{{route('list_keranjang')}}"><i class="material-icons">shopping_cart</i></a>
        </div>
        <!-- Button Keranjang -->

        <!-- Item Keranjang -->

        <!-- Item Keranjang -->

        <br>
    </div>
    <!--keranjang-->
</div>
@include('layouts.footer')
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if ($value == "") {
                $value = "/";
            }
            $.ajax({
                'type': 'get',
                'url': '{{route("searchajax")}}',
                'data': {
                    'search': $value
                },
                'success': function(data) {
                    $('tbody').html(data);
                },
                'error': function(xhr, status, error) {
                    alert("lala");
                }
            });


        });


    });

</script>
<script>
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });

</script>
@endsection
