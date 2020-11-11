@extends('master')

@section('content')
<div class="box box-primary">
    <div class="box-header">
        Pemiilahan Osis
    </div>
</div>
<div class="row">
    <form action="{{ url('/guru/votes') }}" method="post">
        @csrf
        @foreach ($osis as $data)
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{ $data->user->name }}</h3>
                </div>
                <div class="widget-user-image">
                    <img width="128" height="128" class="img-circle" src="{{ asset('photo/'.$data->photo) }}"
                        alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                                <ul>
                                    <li>
                                        <h5 class="description-header">Pernah gagal bercinta</h5>
                                    </li>
                                </ul>

                                <div class="form-group">
                                    <label for="">Pilih</label>
                                    <input type="radio" name="radio[]" id="radio{{ $data->user->id }}"
                                        value="{{ $data->user->id }}"
                                        onclick="return confirm('Anda yakin dengan pilihan ini?')" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        @endforeach
</div>
<button class="btn btn-primary" type="submit">Next</button>
</form>
@endsection
