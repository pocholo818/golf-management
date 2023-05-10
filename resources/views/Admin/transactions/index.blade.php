@extends('layouts.admin')

@section('content')
<div class="container">
            <div class="live-preview">
                <div>
                    <div class="row">

    <div class="col-lg-12">
        <div class="row">
            <div class="col-10">
                <h5 class="header mt-2">Finance</h5>
            </div>
        </div>

        <!-- Button trigger modal -->

        <div class="card p-4 border mt-4">
            <div class="row">


                <table class="table" style="text-align: center">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">Member Account ID</th>
                            <th scope="col">Total</th>
                            <th scope="col">Invoice</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                       <td>1</td>
                       <td>name</td>
                       <td>010201</td>
                       <td>210</td>
                       <td><button type="button" class="btn btn-primary" href="{{route('invoice')}}">Check Invoice</button></td>
                    </tbody>

                </table>
                {{-- {!! $members->render() !!} --}}
            </div>

        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
