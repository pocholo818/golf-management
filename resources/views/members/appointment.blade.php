@extends('layouts.member')

@section('content')
<div class="container">
            <div class="live-preview">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-4 border mt-4">
                                <form>
                                <div class="form-group col-md-8" style="margin-top: 10px">
                                    <label for="inputState">Golf Course</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>Golf Course 1</option>
                                      <option>Golf Course 2</option>
                                      <option>Golf Course 3</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-8" style="margin-top: 10px">
                                    <label for="inputState">Date</label>
                                    <input type="date" class="form-control">
                                  </div>

                                  <div class="row" style="margin-top: 5px">
                                    <div class="form-group col-md-6" style="margin-top: 10px">
                                        <label for="inputState">Start Time</label>
                                        <select id="inputState" class="form-control">
                                          <option selected>8:00 A.M</option>
                                          <option>9:00 A.M</option>
                                          <option>10:00 A.M</option>
                                          <option>11:00 A.M</option>
                                          <option>1:00 P.M</option>
                                          <option>2:00 P.M</option>
                                          <option>3:00 P.M</option>
                                          <option>4:00 P.M</option>
                                        </select>
                                  </div>
                                  <div class="form-group col-md-6" style="margin-top: 10px">
                                    <label for="inputState">End Time</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>9:00 A.M</option>
                                      <option>10:00 A.M</option>
                                      <option>11:00 A.M</option>
                                      <option>12:00 N.N</option>
                                      <option>1:00 P.M</option>
                                      <option>2:00 P.M</option>
                                      <option>3:00 P.M</option>
                                      <option>4:00 P.M</option>
                                      <option>5:00 P.M</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-1" style="margin-top: 10px">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Number of Players</label>
                            <select id="inputState" class="form-control">
                              <option selected>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                            </select>
                    </div>

                    <div style = "display: flex; justify-content:flex-end">
                        <button class="btn btn-success">Save</button>
                    </div>
                    <form>
                    <!-- end row -->
                </div>
            </div>
</div>
@endsection
