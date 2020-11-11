@extends('master')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-title">
            View All User
        </div>
    </div>
    <div class="box-body">
        <table class="table" id="table">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#table').DataTable();
</script>
@endsection
