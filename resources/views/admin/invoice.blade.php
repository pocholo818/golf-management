@extends('layouts.admin')

@section('content')
<div class="container">
<<<<<<< Updated upstream:resources/views/admin/invoice.blade.php
            <div class="live-preview">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-4 border mt-4">
                                <div class="row">
                                    <h5>Invoice Page is working</h5>
                                </div>
=======
<div class="live-preview">
<div>
<div class="row">
<div class="col-lg-12">
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
                    <th scope="col">Member Name</th>
                    <th scope="col">Email</th>
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
                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->guests }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->time }}</td>
                    <td>
>>>>>>> Stashed changes:resources/views/Admin/Appointments/index_appointments.blade.php

                        {{-- <form action="{{ route('edit_appt', $item->app_id) }}" method="POST">
                            {!! csrf_field() !!}
                            @method('PUT')
                        <button type="submit" class="btn btn-primary" >
                            Accept
                        </button>
                    </form> --}}

                @if($item->status == 'Accepted')
  
                    <button type="button" class="btn btn-outline-success" style="width: 100%" disabled>Accepted</button>
                @elseif($item->status == 'Declined')
                    <button type="button" class="btn btn-outline-danger" style="width: 100%" disabled>Declined</button>
                @else
                    <a href="{{ route('edit_appt', $item->app_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to accept this appointment?')){document.getElementById('update-form-{{ $item->app_id }}').submit();}">
                        <button type="submit" class="btn btn-success">Accept</button>
                    </a>
                    <form id="update-form-{{$item->app_id}}" action="{{ route('edit_appt', $item->app_id) }}" method="post" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                
                    <a href="{{ route('decline_appt', $item->app_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to decline this appointment?')){document.getElementById('decline-form-{{ $item->app_id }}').submit();}">
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </a>
                
                    <form id="decline-form-{{$item->app_id}}" action="{{ route('decline_appt', $item->app_id) }}" method="post" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>
                @endif
                

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
