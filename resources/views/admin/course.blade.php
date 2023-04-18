@extends('layouts.admin')

@section('content')
<div class="container">
            <div class="live-preview">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                + Add
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Golf Course:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('admin/course') }}" method="post" enctype="multipart/form-data" class="row g-3">
                                            {!! csrf_field() !!}
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Number</label>
                                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Price</label>
                                                <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Enter Golf Course Capacity</label>
                                                <input type="text" name="capacity" class="form-control" id="exampleFormControlInput1" placeholder="">
                                            </div>
                                            <div class="">
                                                <label for="formFile" class="form-label">Default file input example</label>
                                                <input type="file" name="photo" step="any" class="form-control">
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
                            <div class="card p-4 border mt-4">
                                <div class="row">


                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Golf Course Number</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Capacity</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($course as $item)
                                          <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                @if(isset($item->photo))
                                                <img src="{{ asset('public/images/'.$item->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:200px; width:200px;">
                                                @else
                                                    <img src="{{ asset('public/images/default.png') }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block;">
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->capacity }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
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
