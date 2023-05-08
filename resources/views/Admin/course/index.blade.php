@extends('layouts.admin')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">
<div class="col-lg-12">
<div class="row">
            <div class="col-10">
                <h5 class="header mt-2">Course</h5> 
            </div>
            <div class="col-2">
                <a href="{{route('create-course')}}">
                    <button type="button" style="width:100%" class="btn btn-primary" >
                    + Add Course
                    </button>
                </a>
            </div>
</div>
<!-- Button trigger modal -->

<div class="card p-4 border mt-4">
<div class="row">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Image</th>
<th scope="col">Golf Course Number</th>
<th scope="col">Price</th>
<th scope="col">Capacity</th>
<th scope="col">Action</th>
</tr>
</thead>

@php
$count = ($courses->currentPage() - 1) * $courses->perPage() + 1;
@endphp

@foreach($courses as $item)

<tbody>

<tr>
<th scope="row">{{ $count++ }}</th>
<td>
    @if($item->photo)
    <img src="{{ asset('public/course/'.$item->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:100px; width:100px;">
    @else
        <img src="{{ asset('images/no_image.jpg') }}" class="img-thumbnail default" style="margin-left: auto; margin-right: auto; display: block; height:100px; width:100px;">
    @endif
</td>
<td>{{ $item->name }}</td>
<td>{{ $item->price }}</td>
<td>{{ $item->capacity }}</td>
<td>
    <a href="{{route('edit-course', $item->course_id)}}">
    <button type="button" class="btn btn-primary" >
        Edit
    </button>
    </a>

    <a   href="{{ route('delete-course', $item->course_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')){document.getElementById('delete-form-{{ $item->course_id }}').submit();}">
        <button type="submit"  class="btn btn-danger" >Delete</button>
        </a>

        <form  id="delete-form-{{$item->course_id}}" action="{{ route('delete-course', $item->course_id) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </form>
</td>
</tr>
@endforeach
</tbody> 

</table>
{!!  $courses->render() !!}
</div>

</div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection


