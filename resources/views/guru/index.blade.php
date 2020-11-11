@extends('master')

@section('content')
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Tata Cara pemilihan!</h4>
</div>
<div class="content">
    <div class="box">
        <div class="box-body">
            <ul>
                <li>bla bla bla</li>
                <li>bla bla bla</li>
                <li>bla bla bla</li>
                <li>bla bla bla</li>
            </ul>
        </div>
    </div>
    <a href="{{ url('/guru/pemOsis') }}">
        <button class="btn btn-primary">Next</button>
    </a>
</div>
@endsection
