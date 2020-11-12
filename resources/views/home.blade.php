@extends('master')

@section('content')
<div class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                Profile
            </div>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                <h4>Selamat Datang {{ auth()->user()->name }}</h4>
                <p>role {{ auth()->user()->keterangan }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
