@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('finance') }}">
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

        <form action="{{ route('update_finance', $finance->bill_id) }}" method="post" enctype="multipart/form-data"
            class="row g-3">
            {!! csrf_field() !!}
            @method('PUT')

            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Member Name</label>
                <input type="text" name="member_name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $finance->member_name }}" readonly>
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Member Account ID</label>
                <input type="text" name="account_id" class="form-control" id="exampleFormControlInput1"
                    value="{{ $finance->account_id }}" readonly>
            </div>
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Total</label>
                <input type="number" name="total" class="form-control" id="exampleFormControlInput1"
                    value="{{ $finance->total }}">
            </div>

            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Remarks</label>
                <input type="text" name="remarks" class="form-control" id="exampleFormControlInput1"
                    value="{{ $finance->remarks }}">
            </div>

            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-success w-100">Update</button>
            </div>
        </form>

    @endsection
