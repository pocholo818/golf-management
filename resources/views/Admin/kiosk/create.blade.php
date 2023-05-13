@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('search_kiosk') }}">
            <button type="button" class="btn btn-outline-danger">Back</button>
        </a>
    </div>
    <form action="{{route('store_kiosk')}}" method="post" enctype="multipart/form-data" class="row g-3">
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
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Member Name</label>
            <input type="text" name="member_name" class="form-control" id="exampleFormControlInput1"
                value="{{ $kiosk->first_name }} {{ $kiosk->last_name }}" readonly>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Member Account ID</label>
            <input type="text" name="account_id" class="form-control" id="exampleFormControlInput1"
                value="{{ $kiosk->account_code }}" readonly>
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Total</label>
            <input type="number" name="total" class="form-control" id="exampleFormControlInput1"
                value="{{ old('total') }}">
        </div>
      
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success w-100">Create</button>
        </div>
    </form>

@endsection
