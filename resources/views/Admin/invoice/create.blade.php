@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;"><strong>Generate Invoice</strong></p>
        </div>
        <hr>
      </div>

<form action="{{ route('search_invoice') }}" method="get" >
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">From:</label>
      <input type="date" name="from" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">To:</label>
      <input type="date" name="to" class="form-control" id="inputPassword4">
    </div>
  </div>
<br>
  <div class="form-group">
    <label for="inputAddress">Member ID:</label>
    <input type="text" name="account_code" class="form-control" id="inputAddress">
  </div>
  <div class="buttons" style="margin-top: 5%;">
    <div class="row justify-content-end">
      {{-- <div class="col-md-2">
            <button type="submit" class="btn btn-secondary col-md-12">Search</button>
        </div> --}}
      <div class="col-md-2">

        <a href="{{ route('admin_invoice') }}">
          <button type="button" class="btn btn-danger col-md-12">Back</button>
        </a>
      </div>

      <div class="col-md-2">
          <button type="submit" class="btn btn-primary col-md-12">Generate </button>
      </div>
    </div>
  </div>


</div>
</form>
    @endsection

      {{-- @if($_GET)
        @if($bill)
            @foreach ($bill as $data)
            <div class="post-list">
                <h2>{{ $data->member_name }} {{$data->type}} ({{ $data->total }}) - {{ $data->created_at }}</h2>
            </div>
            @endforeach
            <div class="post-list">
                <h2>Total: {{ $sum }}</h2>
            </div>
        @else 
            <div>
                <h2>No bill found</h2>
            </div>
        @endif
    @endif 
   --}}