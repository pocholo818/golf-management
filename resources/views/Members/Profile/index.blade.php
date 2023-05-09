@extends('layouts.member')

@section('content')
<div class="container">
    <div class="live-preview">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-4">
                    <img class="card-img" src="{{ asset('images/dp.png') }}">
                </div>

                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">First Name: {{ auth('member')->user()->first_name }}</h5>
                        <h5 class="card-title">Last Name: {{ auth('member')->user()->last_name }}</h5>
                        <h5 class="card-title">Mobile Number: {{ auth('member')->user()->mobile_number }}</h5>
                        <h5 class="card-title">Email: {{ auth('member')->user()->email }}</h5>

                       <a type="button" class="btn btn-primary" href="{{ route('profile-edit', auth('member')->user()->customer_id) }}">Edit Profile</a>


                        {{-- <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit Profile
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <img class="card-img" src="{{ asset('images/dp.png') }}" style="display:block; margin-right:auto; margin-left:auto;">

                                                <form>
                                                    <div class="mb-3">
                                                        <label class="form-label">First Name:</label>
                                                        <input type="text" class="form-control">


                                                    <div class="mb-3">
                                                        <label class="form-label">Last Name:</label>
                                                        <input type="text" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Mobile Number:</label>
                                                        <input type="number" class="form-control">
                                                    </div>

                                                    <fieldset disabled="disabled">
                                                        <div class="mb-3">
                                                            <label for="disabledTextInput" class="form-label">Email:</label>
                                                            <input type="email" id="disabledTextInput" class="form-control">
                                                        </div>
                                                    </fieldset>
                                                </form>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Update Profile</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
