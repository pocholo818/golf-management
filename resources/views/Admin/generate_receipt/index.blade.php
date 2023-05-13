@extends('layouts.admin')

@section('content')


<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
        </div>
        <hr>
      </div>

      <div class="container">

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">Bill To: <span style="color:#5d9fc5 ;"></span></li>
              <li class="text-muted">Buyer Name: </li>
              <li class="text-muted">Buyer Address:</li>
              <li class="text-muted">Buyer Contact Number: <span>123-456-789</span> </li>
              <li class="text-muted">Buyer Email Address:  </li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                  class="fw-bold">Invoice Number:</span>#123-456</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                  class="fw-bold">Invoice Date: </span>Jun 23,2021</li>
            <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
              class="fw-bold">Payment Due: </span>Jun 23,2021</li>
        </ul>
          </div>
        </div>

        <div class="row my-2 mx-1">
          <table class="table table-striped table-borderless" style="text-align: center">
            <thead style="background-color:#15a302 ;" class="text-white" >
              <tr>
                <th scope="col" >Item</th>
                <th scope="col">Qty</th>
                <th scope="col">Price per unit</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>item</td>
                <td>#</td>
                <td>$800</td>
                <td>$800</td>
              </tr>
              <tr>
                <td>item</td>
                <td>#</td>
                <td>$10</td>
                <td>$800</td>
              </tr>
              <tr>
                <td>item</td>
                <td>#</td>
                <td>$300</td>
                <td>$800</td>
              </tr>
            </tbody>

          </table>
        </div>
        <div class="row d-flex justify-content-end">
          <div class="col-xl-3" style="text-align: end">
            <ul class="list-unstyled" >
              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal: </span></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax 00.0%: </span></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Fees and Discount: </span></li>
            </ul>
          <hr style="width: 150%;">
            <p class="text-black float-center" style="margin-top: -20px;"><span class="text-black me-3"> Total Amount: </span><span
                style="font-size: 25px;"></span></p>
          </div>
          <div class="col-md-3 ">
              <ul class="list-unstyled" >
                <li class="text-muted ms-3"><span class="text-black me-2">₱</span><span class="text-black"><strong>00.0</strong> </span></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-2">₱</span><span class="text-black "><strong>00.0</strong> </span></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-2">₱</span><span class="text-black"><strong>00.0 </strong></span></li>
              </ul>
              <p class="text-black float-center"><span class="text-black me-2">₱</span><span class="text-black me-3"> <strong>00.0</strong> </span><span
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
</div>


    @endsection