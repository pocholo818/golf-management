@extends('layouts.member')
{{-- @vite(['resources/sass/course_members.scss']) --}}

@section('content')

<div class="modal-header">
    <a href="{{route('bookCourse')}}">
        <button type="button" class="btn btn-outline-danger">Back</button>
    </a>
</div>

@if ($errors->any())
    <div class="alert alert-danger" id="error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#error-message").fadeOut("slow");
        }, 1000); // 10 seconds
    });
</script>

    <div class="row">
        <div class="col-lg-12">
            <div class="card p-4 border mt-4">
                <form action="{{route('book-store')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group col-md-8" style="margin-top: 10px">
                        <label for="inputState">{{$courses->name}}</label>
                        <input class="form-control mt" type="text" name="name" value="{{$courses->name}}" readonly hidden>
                        <label for="inputState" style="padding-left: 20px">Capacity {{$courses->capacity}}</label>
                        <input class="form-control mt" type="number" name="capacity" value="{{$courses->capacity}}" readonly  hidden>
                    </div>
                    {{-- <div class="row" style="margin-top: 5px">
                    <div class="col-md-6" style="margin-top: 10px">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Golf course </label>
                        <input class="form-control mt" type="text" name="name" value="{{$courses->name}}" readonly hidden>
                    </div>
                    <div class="col-md-6" style="margin-top: 10px">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Capacity</label>
                        <input class="form-control mt" type="number" name="capacity" value="{{$courses->capacity}}" readonly  hidden>
                    </div>
                    </div> --}}
                    <div class="form-group" style="margin-top: 10px">
                        <label for="inputState">Date</label>
                        <input type="date" class="form-control" name="date" value="{{ old('date') }}" >
                    </div>
                    <div class="row" style="margin-top: 5px">
                        <div class="form-group col-md-6" style="margin-top: 10px">
                            <label for="inputState">Reserved Time</label>
                            <select id="inputState" class="form-control" name="time">
                                <option></option>
                                <option value="8:00 A.M - 12:00 P.M" {{ old('time') == '8:00 A.M - 12:00 P.M' ? 'selected' : '' }}>8:00 A.M - 12:00 P.M</option>
                                <option value="1:00 P.M - 5:00 P.M" {{ old('time') == '1:00 P.M - 5:00 P.M' ? 'selected' : '' }}>1:00 P.M - 5:00 P.M</option>
                            </select>
                            
                    </div>
                    <div class="col-md-6" style="margin-top: 10px">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Number of Players</label>
                        <input class="form-control mt" type="number" name="guests" value="{{ old('guests') }}" oninput="checkCapacity(this)">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>

                <script>
                    function checkCapacity(input) {
                        var capacity = {{$courses->capacity}};
                        if (input.value > capacity) {
                            alert("Number of players cannot be greater than the capacity of the course.");
                            input.value = capacity; // Reset the value to the maximum capacity
                        }
                    }
                    </script>
                
@endsection
