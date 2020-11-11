@extends('master')

@section('content')
<div class="box">
    <div class="box-header">
        <div class="box-title">
            Pemilihan Selesai
        </div>
    </div>
    <div class="box-body">
        Terima Kasih {{ auth()->user()->name }} telah berpartisipasi
        <br>
        osis
        {{ $vote_osis_saya->user->name }}
        <br>
        mpk
        {{ $vote_mpk_saya->user->name }}
    </div>
</div>
@endsection
