@extends('master')

@section('content')
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
    {{ session('message') }}.
</div>
@endif
<div class="content">
    <div class="box box-danger">
        <div class="box-header">
            <div class="box-title">
                Pemilihan Kandidat
            </div>
        </div>
        <div class="box-body">
            <form action="{{ url('/admin/simpanKandidat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Categori</label>
                    <select name="categori_id" class="form-control list" required>
                        <option value="">---</option>
                        @foreach ($categoris as $data)
                        <option value="{{ $data->id }}">{{ $data->categori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pilih Kandidat</label>
                    <select name="user_id" id="list" class="form-control list" required>
                        <option value="">---</option>
                        @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Photo</label>
                    <input type="file" name="photo" class="form-control-file">
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <div class="box box-danger">
        <div class="box-header">
            <div class="box-title">
                List
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover table-borderer">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Categoris</th>
                    <th>#</th>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($kandidats as $kandidat)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kandidat->user->name }}</td>
                        <td>{{ $kandidat->categoris->categori }}</td>
                        <td>
                            <a href="{{ url('/admin/delKandidat/'.$kandidat->id) }}">
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('anda yakin menghapus data')">Delete</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.list').select2();
    });
</script>
@endsection
