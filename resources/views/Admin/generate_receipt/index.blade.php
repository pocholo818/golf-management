@extends('layouts.admin')

@section('content')


<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">

          <form action="{{ route('store_invoice') }}" method="POST">
            @csrf

          <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: {{ $randomString }} </strong></p>

        </div>
        <hr>
      </div>
  
  
      <div class="container">

        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">

              @foreach ($uniqueMembers as $member)
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Member ID:</span>{{ $member->account_id }}
              </li>
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Member Name:</span>{{ $member->member_name }}
              </li>
              <li class="text-muted">
                  <span style="display: inline-block; width: 120px;">Date:</span>{{ $member->created_at }}
              </li>

              @endforeach

          </ul>                    
          </div>
        
        </div>

     
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
            <tr>
              <td>{{$data->type}}</td>
              <td>{{ $data->total }}</td>
            </tr>
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

              <input type="hidden" name="invoice_number" value="{{ $randomString }}">
              <input type="hidden" name="customer_id" value="{{ $member->account_id }}">
              <input type="hidden" name="member_name" value="{{ $member->member_name }}">
              <input type="hidden" name="total" value="{{ $sum }}">
              
                  <button type="submit" class="btn btn-primary text-capitalize" style="background-color:#15a302; ">Generate</button>

</form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>


    @endsection