@extends('layouts.member')

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
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($appt as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->guests }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->time }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>

                                                    @if ($item->status == 'Accepted')
                                                        <button type="button" class="btn btn-outline-success"
                                                            style="width: 100%" disabled>Accepted</button>
                                                    @elseif($item->status == 'Declined')
                                                        <button type="button" class="btn btn-outline-danger"
                                                            style="width: 100%" disabled>Declined</button>
                                                    @else
                                                        <a href="{{ route('appointment-edit', $item->app_id) }}">
                                                            <button type="button" class="btn btn-primary"
                                                                style="width: 48%">
                                                                Edit
                                                            </button>
                                                        </a>

                                                        <a href="{{ route('appointment-delete', $item->app_id) }}"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this appointment?')){document.getElementById('delete-form-{{ $item->app_id }}').submit();}">
                                                            <button type="submit" class="btn btn-danger"
                                                                style="width: 48%">Delete</button>
                                                        </a>

                                                        <form id="delete-form-{{ $item->app_id }}"
                                                            action="{{ route('appointment-delete', $item->app_id) }}"
                                                            method="post" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
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
