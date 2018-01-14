@extends('layouts.navbar') @section('content')
<div class="container">
    <br><br>
    <div class="row">
        <div class="col s12 l12">
            <a class="btn btn-large waves-effect waves-light grey" href="#" disabled>Hasil Pencarian dari :<b> {{$search}}</b></a>
            <br><br>
        </div>
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
</div>
@include('layouts.footer') @endsection
