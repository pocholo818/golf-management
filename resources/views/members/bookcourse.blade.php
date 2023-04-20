@extends('layouts.member')
@vite(['resources/sass/course_members.scss'])

@section('content')
                    {{-- <!-- Modal --> --}}

<div class="container">
    <h5 class="header">Golf Course</h5>
    <div class="row">
        @foreach($bookcourses as $item)

        <div class="col-md-4">
            <div class="card" style="margin:2rem;width: 18rem;">
                @if(isset($item->photo))
                    <img src="{{ asset('public/course/'.$item->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:200px; width:200px;">
                    @else
                        <img src="{{ asset('public/course/default.png') }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block;">
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Capacity: {{$item->capacity}}</li>
                    <li class="list-group-item">₱ {{$item->price}}</li>
                  </ul>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Book Appointment
                  </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

{{-- Booking Appointment Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Book Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div clss="live-preview">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-4 border mt-4">
                                <form>
                                    <div class="form-group col-md-8" style="margin-top: 10px">
                                        <label for="inputState">Golf Course</label>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px">
                                        <label for="inputState">Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="row" style="margin-top: 5px">
                                        <div class="form-group col-md-6" style="margin-top: 10px">
                                            <label for="inputState">Reserved Time</label>
                                            <select id="inputState" class="form-control">
                                            <option>8:00 A.M - 12:00 P.M</option>
                                            <option>1:00 P.M - 5:00 P.M</option>
                                            </select>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 10px">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Number of Players</label>
                                        <input class="form-control mt" type="number">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



            {{-- <div class="live-preview">89
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card p-2 border mt-4">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{asset('images/golf_course1.png')}}" alt="golf_image" width="200">
                                    </div>
                                    <div class="col-9">
                                        <h4 class="mb-4">Golf Course Name</h4>
                                        <h4 class="mb-4">Description</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div> --}}

            {{-- GOLF COURSE BOOKING FIELDS --}}

</div>
@endsection
