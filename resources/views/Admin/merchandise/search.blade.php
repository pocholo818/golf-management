@extends('layouts.admin')

@section('content')

    <div class="modal-header">
        <a href="{{ route('merchandise') }}">
            <button type="button" class="btn btn-outline-danger">Back</button>
        </a>
    </div>
    <form action="{{ route('search_merchandise') }}" method="get" enctype="multipart/form-data" class="row g-3">
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Search Member Name/Account ID</label>
            <input type="text" name="search" class="form-control">
        </div>
      
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success w-100">Search</button>
        </div>
    </form>

    {{-- @if($_GET)
        @if($customer)
            <div class="post-list">
                <h2>{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                <a type="button" class="btn btn-primary" href="{{ route('create_kiosk', $customer->account_code) }}">Generate Invoice</a>
            </div>
        @else 
            <div>
                <h2>No customer found</h2>
            </div>
        @endif
    @endif  --}}
@endsection
