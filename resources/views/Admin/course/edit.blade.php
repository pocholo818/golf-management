
@extends('layouts.admin')

@section('content')

<div class="modal-header" >
    <a href="{{route('course')}}">
    <button type="button" class="btn btn-outline-danger" >Back</button>
    </a>
</div>

            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('update-course', $courses->course_id)}}" method="post">
                    @csrf
                    @method('PUT')
                
                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Number</label>
                            <input type="text" name="name" value="{{$courses->name}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Price</label>
                            <input type="text" name="price" value="{{$courses->price}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="">
                            <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Capacity</label>
                            <input type="text" name="capacity" value="{{$courses->capacity}}" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input type="file" name="photo" step="any" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-success w-100">Edit</button>
                        </div>
                </form>
@endsection




