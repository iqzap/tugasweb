<html>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<head>
    <title>Grafik Pembeli Barang</title>
    <link href="{{ asset('css/material-icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection" />
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/exporting.js') }}"></script>
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script type="text/javascript">
        var chart1;
        $(document).ready(function() {
            chart1 = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    type: 'column'
                },
                title: {
                    text: 'Statistik Penjualan '
                },
                xAxis: {
                    categories: [' ']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Barang Terjual'
                    }
                },
                series: [
                    @foreach($data as $index => $barang) {
                        name: '{{$barang->nama_barang_nota}}',
                        data: [{{$barang->jumlah}}]
                    },
                    @endforeach

                ]
            });
        });

    </script>
</head>

<body>
    @include('layouts.admin_navbar')
    <br>
    <br>
    <div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>
    @include('layouts.admin_footer')
</body>

</html>
