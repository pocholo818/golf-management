@extends('layouts.admin')

@section('content')


<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">

          @foreach ($uniqueMembers as $member)
          <p style="color: #7e8d9f;font-size: 20px;">Member >> <strong>ID: {{ $member->account_id }}</strong></p>
          @endforeach

        </div>
        <hr>
      </div>
  
  
      <div class="container">

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              {{-- <li class="text-muted">Bill To: <span style="color:#5d9fc5 ;"></span></li> --}}
              @foreach ($uniqueMembers as $member)
              <li class="text-muted"> <span style="display: inline-block; width: 120px;">Member Name: </span>{{ $member->member_name  }}</li>
              <li class="text-muted"> <span style="display: inline-block; width: 120px;">Date: </span>{{ $member->created_at  }} </li>
              @endforeach
              {{-- <li class="text-muted">Buyer Contact Number: <span>123-456-789</span> </li>
              <li class="text-muted">Buyer Email Address:  </li> --}}
            </ul>
          </div>
          {{-- <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                  class="fw-bold">Invoice Number:</span>#123-456</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
                  class="fw-bold">Invoice Date: </span>Jun 23,2021</li>
            <li class="text-muted"><i class="fas fa-circle" style="color:#15a302 ;"></i> <span
              class="fw-bold">Payment Due: </span>Jun 23,2021</li>
        </ul>
          </div> --}}
        </div>

        {{-- @if ($bill)
@foreach ($bill as $data)
    <div class="post-list">
        <h2>{{ $data->account_id }} {{ $data->member_name }} ({{ $data->total }}) - {{ $data->created_at }}</h2>
    </div>
@endforeach
<div class="post-list">
    <h2>Total: {{ $sum }}</h2>
</div>
@else
<div>
    <h2>No bill found</h2>
</div>
@endif --}}

@if ($bill)
        <div class="row my-2 mx-1">
          <table class="table table-striped table-borderless" style="text-align: center">
            <thead style="background-color:#15a302 ;" class="text-white" >
              <tr>
                <th scope="col" >Type</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
 @foreach ($bill as $data)
            <tbody>       
              <tr>
                <td> {{$data->type}}</td>
                <td>{{ $data->total }}</td>
              </tr>
            </tbody>
   @endforeach
          </table>
        </div>

        <div class="row d-flex justify-content-end">
          <div class="col-xl-3" style="text-align: end">
            <ul class="list-unstyled" >
              {{-- <li class="text-muted ms-3"><span class="text-black me-4">SubTotal: </span></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax 00.0%: </span></li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Fees and Discount: </span></li> --}}
            </ul>
          <hr style="width: 150%;">
            <p class="text-black float-center" style="margin-top: -20px;"><span class="text-black me-3"> Total Amount: </span><span
                style="font-size: 25px;"></span></p>
          </div>
          <div class="col-md-3 ">
              <ul class="list-unstyled" >
                {{-- <li class="text-muted ms-3"><span class="text-black me-2">₱</span><span class="text-black"><strong>00.0</strong> </span></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-2">₱</span><span class="text-black "><strong>00.0</strong> </span></li>
                <li class="text-muted ms-3 mt-2"><span class="text-black me-2">₱</span><span class="text-black"><strong>00.0 </strong></span></li> --}}
              </ul>
              <p class="text-black float-center"><span class="text-black me-2">₱</span><span class="text-black me-3"> <strong> {{ $sum }} </strong> </span><span
                  style="font-size: 25px;"></span></p>
            </div>
        </div>

    @else
      <div>
          <h2>No bill found</h2>
      </div>
@endif

        <hr>

        <div class="row">
          <div >
            <div class="d-flex justify-content-between">
              <a href="{{ route('create_invoice') }}" class="mr-2">
                <button type="button" class="btn btn-danger text-capitalize">back</button>
              </a>

              @php
              $individualBill = $bill->first();
          @endphp
          
          @if ($individualBill)
              <a href="{{ route('generate_receipt', ['account_id' => $individualBill->account_id, 'sum' => $sum]) }}" class="mr-2">
                  <button type="button" class="btn btn-primary text-capitalize" style="background-color:#15a302;">Generate</button>
              </a>
          @endif
          
          
          
                
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>


    @endsection