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

<form>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">From:</label>
      <input type="date" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">To:</label>
      <input type="date" class="form-control" id="inputPassword4">
    </div>
  </div>
<br>
  <div class="form-group">
    <label for="inputAddress">Member ID:</label>
    <input type="text" class="form-control" id="inputAddress">
  </div>
  <div class="buttons" style="margin-top: 5%;">
    <div class="row justify-content-end">
      <div class="col-md-2">

        <a href="{{ route('admin_invoice') }}">
          <button type="button" class="btn btn-danger col-md-12">Discard</button>
        </a>
      </div>

      <div class="col-md-2">
        <a href="{{ route('generate_receipt') }}">
          <button type="button" class="btn btn-primary col-md-12">Generate Report</button>
        </a>
      </div>
    </div>
  </div>
  
</div>
</form>
    @endsection