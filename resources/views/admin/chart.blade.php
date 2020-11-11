@extends('master')
@section('content')
<div id="container">

</div>
@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('container', {
chart: {
type: 'column'
},
title: {
text: 'Hasil Sementara Pemilihan Osis'
},
subtitle: {
text: 'SMAN 14 Surabaya'
},
xAxis: {
categories: {!! json_encode($categoris) !!},
crosshair: true
},
yAxis: {
min: 0,
title: {
text: 'Range Pemilih'
}
},
tooltip: {
headerFormat: '<span style="font-size:10px">{point.key}</span><table>',

    footerFormat: '</table>',
shared: true,
useHTML: true
},
plotOptions: {
column: {
pointPadding: 0.2,
borderWidth: 0
}
},
series: [{
name: 'Hasil Pemilihan',
data: {!! json_encode($jumlah) !!}
}]
});
</script>
@endsection
