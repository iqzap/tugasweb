<html>

<head>
    <!--Import Google Icon Font-->
    <link href="{{ asset('css/material-icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
                function() {
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
                                <th>Foto Item</th>
                                <th>Nama</th>
                                <th>Stock</th>
                                <th>ID</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!--Barang in List-->
                            @foreach($data as $index=>$barang)
                            <tr>
                                <td><img style="width: 200px; height: auto;" src="{{ asset('gambar_barang/'. $barang->gambar) }}"></td>
                                <td>{{$barang->nama_barang}}</td>
                                <td>{{$barang->jumlah_barang}}</td>
                                <td>{{$barang->id_barang}}</td>
                                <td> <a class="waves-effect waves-light btn-large" href="{{route('admin.updateView', $barang->id_barang)}}"><i class="material-icons">update</i></a></td>
                                <td> <a class="waves-effect waves-light btn-large" href="{{route('admin.delete', $barang->id_barang)}}"><i class="material-icons">delete</i></a></td>
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
                <br><br><br><br><br>
            </div>
        </div>
        <!--Tabel Barang-->

    </div>
    @include('layouts.admin_footer')
</body>

</html>
