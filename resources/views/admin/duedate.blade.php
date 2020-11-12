@extends('master')
@section('content')
<div class="form-group">
    <label>Date:</label>

    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker">
    </div>
    <!-- /.input group -->
</div>
@endsection
@section('script')
<script>
    $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        timePicker: true,
        singleDatePicker: true,
    })
</script>
@endsection
