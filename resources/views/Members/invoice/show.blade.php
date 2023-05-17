@extends('layouts.member')

@section('content')


<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">

          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>No: {{ $invoice->invoice_number }} </strong></p>

        </div>
        <hr>
      </div>
  
  
      <div class="container">

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">

              {{-- @foreach ($member as $data) --}}
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Member ID:</span>{{ $invoice->customer_id }}
              </li>
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Member Name:</span>{{ $invoice->member_name }}
              </li>
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Date:</span>{{ $invoice->created_at }}
              </li>
              {{-- @endforeach --}}

          </ul>                    
          </div>
        
        </div>

    
        <div class="row my-2 mx-1">

<table class="table table-striped table-borderless" style="text-align: center">
  <thead style="background-color:#15a302 ;" class="text-white">
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>

  <tbody>

      @php
        $types = explode(', ', $invoice->type);
        $amounts = explode(', ', $invoice->amount);
      @endphp

      @foreach ($types as $index => $type)
        <tr>
          <td>{{ $type }}</td>
          <td>{{ $amounts[$index] }}</td>
        </tr>
      @endforeach
  </tbody>
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
              <p class="text-black float-center"><span class="text-black me-2">₱</span><span class="text-black me-3"> <strong> {{ $invoice->total }} </strong> </span><span
                  style="font-size: 25px;"></span></p>
            </div>
        </div>

        <hr>

        <div class="row">
          <div >

            <div class="d-flex justify-content-end">
              {{-- <a href="{{ route('create_invoice') }}" class="mr-2">
                <button type="button" class="btn btn-danger text-capitalize">back</button>
              </a> --}}

              {{-- <input type="hidden" name="invoice_number" value="{{ $randomString }}">
              <input type="hidden" name="customer_id" value="{{ $member->account_id }}">
              <input type="hidden" name="member_name" value="{{ $member->member_name }}">
              <input type="hidden" name="total" value="{{ $sum }}"> --}}

              @if ($invoice->status == 'paid')
              <a href="{{ route('invoice') }}" class="mr-2">
              <button type="button" class="btn btn-outline-danger"
                  style="width: 100%">Back</button>
              </a>
          @else

              <a href="{{ route('payment',$invoice->invoice_id) }}" class="mr-2">
                  <button type="submit" class="btn btn-primary text-capitalize" style="background-color:#15a302; ">Pay</button>
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