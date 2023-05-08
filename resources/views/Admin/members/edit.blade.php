@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('member') }}">
            <button type="button" class="btn btn-outline-danger">Back</button>
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

        <form action="{{ route('update-member', $members->customer_id) }}" method="post" enctype="multipart/form-data"
            class="row g-3">
            {!! csrf_field() !!}
            @method('PUT')
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $members->first_name }}">
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $members->last_name }}">
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1"
                    value="{{ $members->mobile_number }}">
            </div>
            <div class="">
                <label for="formFile" class="form-label">Email</label>
                <input type="email" name="email" step="any" class="form-control" value="{{ $members->email }}">
            </div>
            {{-- <div class="">
                    <label for="formFile" class="form-label">Password</label>
                    <input type="password" name="password" step="any" class="form-control" >
                </div> --}}

            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-success w-100">Update</button>
            </div>
        </form>

    @endsection
