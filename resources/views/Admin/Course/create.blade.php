
@extends('layouts.admin')

@section('content')

<div class="modal-header" >
    <a href="{{route('course')}}">
    <button type="button" class="btn btn-outline-danger" >Back</button>
    </a>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="" method="post" enctype="multipart/form-data" class="row g-3">
    {!! csrf_field() !!}
    <div class="">
        <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Number</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="">
        <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Price</label>
        <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="">
        <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Capacity</label>
        <input type="text" name="capacity" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="">
        <label for="formFile" class="form-label">Default file input example</label>
        <input type="file" name="photo" step="any" class="form-control">
    </div>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-success w-100">Create</button>
    </div>
</form>

  @endsection
