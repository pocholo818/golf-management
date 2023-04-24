@extends('layouts.member_nav')

@section('content')

<div class="container">
<div class="live-preview">
<div>
<div class="row">
<div class="col-lg-12">
<!-- Button trigger modal -->
<a href="">
<h5>Appointments</h5>
</a>

<div class="card p-4 border mt-4">
<div class="row">


    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Golf course</th>
            <th scope="col">Companion(s)</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Action</th>
            </tr>
        </thead>

    <tbody>
        @foreach($appt as $item)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->guests }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->time }}</td>
            <td>
                <a href="{{route('edit_appointment',$item->app_id)}}">
                <button type="button" class="btn btn-primary" >
                    Edit
                </button>
                </a>
                <a   href="{{ route('delete_appointment', $item->app_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this appointment?')){document.getElementById('delete-form-{{ $item->app_id }}').submit();}">
                <button type="submit"  class="btn btn-danger" >Delete</button>
                </a>

                <form  id="delete-form-{{$item->app_id}}" action="{{ route('delete_appointment', $item->app_id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
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
