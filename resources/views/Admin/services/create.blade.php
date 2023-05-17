@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('services') }}">
            <button type="button" class="btn btn-outline-danger">Back</button>
        </a>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="row g-3">
        {!! csrf_field() !!}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($customer)

        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Member Name</label>
            <input type="text" name="member_name" class="form-control" id="exampleFormControlInput1"
                value="{{$customer->first_name}} {{$customer->last_name}}" readonly>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Member Account ID</label>
            <input type="text" name="account_id" class="form-control" id="exampleFormControlInput1"
                value="{{ $customer->account_code }}" readonly>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Total</label>
            <input type="number" name="total" class="form-control" id="exampleFormControlInput1"
                value="{{ old('total') }}">
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Remarks</label>
            <input type="text" name="remarks" class="form-control" id="exampleFormControlInput1"
                value="{{ old('remarks') }}">
        </div>
        @else 
<div>
    <h2>No customer found</h2>
</div>
@endif

        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success w-100">Create</button>
        </div>
    </form>


@endsection
