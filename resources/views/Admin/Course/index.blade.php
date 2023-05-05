@extends('layouts.admin_nav')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">
<div class="col-lg-12">
<!-- Button trigger modal -->
<a href="{{route('courseCreate')}}">
<button type="button" class="btn btn-primary" >
+ Add
</button>
</a>
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

@foreach($courses as $item)

<tbody>

<tr>
<th scope="row">{{ $loop->iteration }}</th>
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
    <a href="{{route('courseEdit', $item->course_id)}}">
    <button type="button" class="btn btn-primary" >
        Edit
    </button>
    </a>

    <a   href="{{ route('courseDelete', $item->course_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')){document.getElementById('delete-form-{{ $item->course_id }}').submit();}">
        <button type="submit"  class="btn btn-danger" >Delete</button>
        </a>

        <form  id="delete-form-{{$item->course_id}}" action="{{ route('courseDelete', $item->course_id) }}" method="post" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

    </form>
</td>
</tr>
@endforeach
</tbody> 

</table>
</div>

</div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection


