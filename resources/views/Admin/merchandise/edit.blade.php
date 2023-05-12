@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('merchandise') }}">
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

        <form action="{{ route('update_merchandise',  $prod->id) }}" method="post" enctype="multipart/form-data"
            class="row g-3">
            {!! csrf_field() !!}
            @method('PUT')

            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Member Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $prod->name }}">
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Member Account ID</label>
                <input type="text" name="account_id" class="form-control" id="exampleFormControlInput1"
                    value="{{ $prod->account_id }}">
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Total</label>
                <input type="number" name="total" class="form-control" id="exampleFormControlInput1"
                    value="{{ $prod->total }}">
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
