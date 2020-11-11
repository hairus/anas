@extends('master')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-title">
            Import User
        </div>
    </div>
    <div class="box-body">
        <form action="{{ url('/admin/importSiswa') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>import User</label>
                <input type="file" class="form-file" name="file_siswa">
            </div>
            <a href="/admin/exportSiswa">
                <button class="btn btn-danger" type="button">Download Template Siswa</button>
            </a>
            <a href="/admin/exportGuru">
                <button class="btn btn-danger" type="button">Download Template Guru</button>
            </a>
            <p></p>
            <button class="btn btn-sm btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
