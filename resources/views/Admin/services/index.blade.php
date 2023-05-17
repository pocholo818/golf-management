@extends('layouts.admin')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">

    <div class="col-lg-12">
        <div class="row">
            <div class="col-10">
                <h5 class="header mt-2">Services</h5>
            </div>
            <div class="col-2">
                <a href="{{route('search_kiosk_services')}}">
                    <button type="button" style="width:100%"  class="btn btn-primary">
                        + Create
                    </button>
                </a>
            </div>
        </div>

        {{-- {{ Button trigger modal}} --}}

        <div class="card p-4 border mt-4">
            <div class="row">


                <table class="table" style="text-align: center">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">Member Account ID</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $count = ($service->currentPage() - 1) * $service->perPage() + 1;
                        @endphp
                        @foreach ($service as $item)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $item->member_name }}</td>
                                <td>{{ $item->account_id }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->remarks }}</td>
                                <td>
                                    <a href="{{ route('edit_services', $item->bill_id) }}">
                                        <button type="button" class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('delete_services', $item->bill_id) }}"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this services?')){document.getElementById('delete-form-{{ $item->bill_id }}').submit();}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </a>

                                    <form id="delete-form-{{ $item->bill_id }}"
                                        action="{{ route('delete_services', $item->bill_id) }}" method="post"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {!! $service->render() !!}
            </div>

        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection

