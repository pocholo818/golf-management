@extends('layouts.admin')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">

<div class="col-lg-12">
<div class="row">
<div class="col-10">
<h5 class="header mt-2">Invoice</h5>
</div>
<div class="col-2">
<a href="{{ route('create_invoice') }}">
    <button type="button" style="width:100%"  class="btn btn-primary">
        + Generate invoice
    </button>
</a>
</div>
</div>

<!-- Button trigger modal -->




<div class="card p-4 border mt-4">
<div class="row">


<table class="table" style="text-align: center">
    <thead >
        <tr>
            <th scope="col">Invoice ID</th>
            <th scope="col">Member ID</th>
            <th scope="col">Member Name</th>      
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody>
        @php
            $count = ($invoice->currentPage() - 1) * $invoice->perPage() + 1;
        @endphp
        @foreach ($invoice as $item)
            <tr>
                <td>{{ $item->invoice_number }}</td>
                <td>{{ $item->customer_id }}</td>
                <td>{{ $item->member_name }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->status }}</td>
                <td>

                    @if($item->status == 'paid')

                    <button type="button" class="btn btn-outline-success" style="width: 100%" disabled>Paid</button>

                @else
                    <a href="{{ route('accept_payment', $item->invoice_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to proceed with the payment?')){document.getElementById('update-form-{{ $item->invoice_id }}').submit();}">
                        <button type="submit" class="btn btn-success" style="width: 100%">Pay</button>
                    </a>
                    <form id="update-form-{{$item->invoice_id}}" action="{{ route('accept_payment', $item->invoice_id) }}" method="post" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>

                    @endif
                    
                    {{-- <a href="{{ route('delete_merchandise', $item->id) }}"
                        onclick="event.preventDefault(); if(confirm('Are you sure you want to remove this member?')){document.getElementById('delete-form-{{ $item->id }}').submit();}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </a>

                    <form id="delete-form-{{ $item->id }}"
                        action="{{ route('delete_merchandise', $item->id) }}" method="post"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
{!! $invoice->render() !!}
</div>

</div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
