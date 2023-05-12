@extends('layouts.admin')

@section('content')

<div class="row">
    <div >
      <div class="d-flex justify-content-between">
        <a href="{{ route('receipt_preview') }}" class="mr-2">
          <button type="button" class="btn btn-danger text-capitalize">Cancel</button>
        </a>
      <span style="margin-right: 15px"></span>
        <button type="button" class="btn btn-primary text-capitalize" style="background-color:#15a302; ">Generate Invoice</button>
      </div>
    </div>
  </div>

<div class="card">
   
    <div class="card-body">
      <div class="container mb-5 mt-3">
        <div class="row d-flex align-items-baseline">
          <div class="col-xl-9">
            <p style="color: #7e8d9f;font-size: 20px;">Invoice > <strong>ID: #123-123</strong></p>
          </div>
          <hr>
        </div>

        
        <div class="container">
  
          <div class="row">
            <div class="col-xl-8">
              <ul class="list-unstyled">
                <li class="text-muted">To: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                {{-- <li class="text-muted">Street, City</li>
                <li class="text-muted">State, Country</li>
                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li> --}}
              </ul>
            </div>
            <div class="col-xl-4">
              <p class="text-muted">Invoice</p>
              <ul class="list-unstyled">
                <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                    class="fw-bold">ID:</span>#123-456</li>
                <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                    class="fw-bold">Creation Date: </span>Jun 23,2021</li>
              </ul>
            </div>
          </div>

          <div class="row my-2 mx-1 justify-content-center">
            <table class="table table-striped table-borderless" style="text-align: center">
              <thead style="background-color:#15a302 ;" class="text-white" >
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Description</th>
                  <th scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Golf Course 1</td>
                  <td>5000.00</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Golf Course 2</td>
                  <td>7000.00</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Golf Course 3</td>
                  <td>10000.00</td>
                </tr>
              </tbody>

            </table>
          </div>
          <div class="row">
            <div class="col-xl-8">
              {{-- <p class="ms-3">Add additional notes and payment information</p> --}}

            </div>
            <div class="col-xl-3">
              <ul class="list-unstyled">
                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal: </span></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Misc. Fee: </span></li>
              </ul>
              <p class="text-black float-start"><span class="text-black me-3"> Total Amount: </span><span
                  style="font-size: 25px;"></span></p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div >
              <div class="d-flex justify-content-between">
                <a href="{{ route('receipt_preview') }}" class="mr-2">
                  <button type="button" class="btn btn-danger text-capitalize">Cancel</button>
                </a>
              <span style="margin-right: 15px"></span>
                <button type="button" class="btn btn-primary text-capitalize" style="background-color:#15a302; ">Generate Invoice</button>
              </div>
            </div>
          </div>
          

        </div>
      </div>
    </div>
    @endsection