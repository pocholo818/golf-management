@extends('layouts.admin')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">

    <div class="col-lg-12">      
        <div class="row">
            <div class="col-10">
                <h5 class="header mt-2">Members</h5> 
            </div>
            <div class="col-2">
                <a href="{{ route('create-member') }}">
                    <button type="button" style="width:100%"  class="btn btn-primary">
                        + Add Member
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
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Mobile Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $count = ($members->currentPage() - 1) * $members->perPage() + 1;
                        @endphp
                        @foreach ($members as $item)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->mobile_number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('edit-member', $item->customer_id) }}">
                                        <button type="button" class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('delete-member', $item->customer_id) }}"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this member?')){document.getElementById('delete-form-{{ $item->customer_id }}').submit();}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </a>

                                    <form id="delete-form-{{ $item->customer_id }}"
                                        action="{{ route('delete-member', $item->customer_id) }}" method="post"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {!! $members->render() !!}
            </div>

        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
