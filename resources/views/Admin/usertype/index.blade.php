@extends('layouts.admin')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">
    <div class="col-lg-12">
        <!-- Button trigger modal -->
        <a href="{{ route('create-user') }}">
            <button type="button" class="btn btn-primary">
                + Add User
            </button>
        </a>

        <div class="card p-4 border mt-4">
            <div class="row">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $count = ($usertype->currentPage() - 1) * $usertype->perPage() + 1;
                        @endphp
                        @foreach ($usertype as $item)
                            <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a href="{{ route('edit-user', $item->id) }}">
                                        <button type="button" class="btn btn-primary">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="{{ route('delete-user', $item->id) }}"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this user?')){document.getElementById('delete-form-{{ $item->id }}').submit();}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </a>

                                    <form id="delete-form-{{ $item->id }}"
                                        action="{{ route('delete-user', $item->id) }}" method="post"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {!! $usertype->render() !!}
            </div>

        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
