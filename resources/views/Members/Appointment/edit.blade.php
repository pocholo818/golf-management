@extends('layouts.member')
{{-- @vite(['resources/sass/course_members.scss']) --}}

@section('content')

<div class="modal-header">
<a href="{{route('appointment')}}">
<button type="button" class="btn btn-outline-danger">Back</button>
</a>
</div>

<div class="row">
<div class="col-lg-12">
<div class="card p-4 border mt-4">

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('appointment-update',$appt->app_id)}}" method="post">
    {!! csrf_field() !!}
    @method('PUT')
    <div class="form-group col-md-8" style="margin-top: 10px">

        <label for="inputState">{{$appt->name}}</label>
        <label for="inputState" style="padding-left: 20px">Capacity {{$appt->capacity}}</label>

    </div>
    <div class="form-group" style="margin-top: 10px">
        <label for="inputState">Date</label>
        <input type="date" class="form-control" name="date" value="{{$appt->date}}" >
    </div>
    <div class="row" style="margin-top: 5px">
        <div class="form-group col-md-6" style="margin-top: 10px">
            <label for="inputState">Reserved Time</label>
            <select id="inputState" class="form-control"  name="time">
                <option></option>
                <option value="8:00 A.M - 12:00 P.M" @if($appt->time == '8:00 A.M - 12:00 P.M') selected @endif>8:00 A.M - 12:00 P.M</option>
                <option value="1:00 P.M - 5:00 P.M" @if($appt->time == '1:00 P.M - 5:00 P.M') selected @endif>1:00 P.M - 5:00 P.M</option>
            </select>
            
    </div>
    <div class="col-md-6" style="margin-top: 10px">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Number of Players</label>
        <input class="form-control mt" type="number" name="guests" value="{{$appt->guests}}" oninput="checkCapacity(this)" >
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        </div>
</form>

<script>
    function checkCapacity(input) {
        var capacity = {{$appt->capacity}};
        if (input.value > capacity) {
            alert("Number of players cannot be greater than the capacity of the course.");
            input.value = {{$appt->guests}}; // Reset the value to the maximum capacity
        }
    }
    </script>

@endsection
