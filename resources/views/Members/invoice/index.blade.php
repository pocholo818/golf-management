@extends('layouts.member')

@section('content')
<div class="container">
<div class="live-preview">
<div>
<div class="row">
<div class="col-lg-12">
<!-- Button trigger modal -->
<a href="">
    <h5>Invoice</h5>
</a>

<div class="card p-4 border mt-4">
    <div class="row">


        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Invoice No.</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Member</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($invoice as $item)
                    <tr>
                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                        <td>{{ $item->invoice_number}}</td>
                        <td>{{ $item->customer_id }}</td>
                        <td>{{ $item->member_name }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->status }}</td>
                        <td>

                                <a href="{{ route('show_invoice', $item->invoice_id) }}">
                                    <button type="button" class="btn btn-primary"
                                        style="width: 48%">
                                        View
                                    </button>
                                </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
