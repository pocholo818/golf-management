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
                                        <form>
                                            <div class="mb-3">
                                                <h2>Gould Course No. :</h2>
                                                <input class="form-control" type="number">
                                                <label class="form-label">Price</label>
                                                <input class="form-control" type="number" placeholder="Input Price">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Capacity</label>
                                                <input class="form-control" type="number" placeholder="Input Number of Capacity">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
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
                                            <th scope="col">Golf Course Number</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Capacity</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>1</td>
                                            <td>500</td>
                                            <td>5</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">2</th>
                                            <td>2</td>
                                            <td>700</td>
                                            <td>10</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">3</th>
                                            <td>3</td>
                                            <td>1000</td>
                                            <td>15</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                          </tr>
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
