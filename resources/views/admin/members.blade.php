@extends('layouts.admin')

@section('content')
<div class="container">
            <div class="live-preview">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                + Add Member
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Member:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url(route('members.store')) }}" method="post" enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                                <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                                            </div>
                                            <div class="">
                                                <label for="formFile" class="form-label">Email</label>
                                                <input type="email" name="email" step="any" class="form-control" required>
                                            </div>
                                            <div class="">
                                                <label for="formFile" class="form-label">Password</label>
                                                <input type="password" name="password" step="any" class="form-control" required>
                                            </div>

                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                <button type="submit" class="btn btn-success w-100">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>

                            @foreach($members as $item)
                            <div class="modal fade" id="editcourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Update Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('members.update' ,$item->customer_id) }}" method="post">
                                            {!! csrf_field() !!}
                                            @method("PATCH")

                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="{{$item->first_name}}" required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="{{$item->last_name}}"  required>
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                                <input type="number" name="mobile_number" class="form-control" id="exampleFormControlInput1" value="{{$item->mobile_number}}"  required>
                                            </div>
                                            <div class="">
                                                <label for="formFile" class="form-label">Email</label>
                                                <input type="email" name="email" step="any" value="{{$item->email}}" class="form-control" required>
                                            </div>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                    <button type="submit" class="btn btn-success w-100">Edit</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="card p-4 border mt-4">
                                <div class="row">


                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Mobile Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($members as $item)
                                          <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->mobile_number }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editcourse">
                                                    Edit
                                                </button>

                                                <a   href="{{ route('members.destroy', $item->customer_id) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this article?')){document.getElementById('delete-form-{{ $item->customer_id }}').submit();}">
                                                <button type="submit"  class="btn btn-danger" >Delete</button>
                                                </a>

                                                <form  id="delete-form-{{$item->customer_id}}" action="{{ route('members.destroy', $item->customer_id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
