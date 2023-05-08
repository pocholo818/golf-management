@extends('layouts.member')
{{-- @vite(['resources/sass/course_members.scss']) --}}

@section('content')
{{-- <!-- Modal --> --}}
<div class="container">
    <h5 class="header">Golf Course</h5> 
    <div class="row">
        @foreach($bookcourses as $item)

        <div class="col-md-4">
            <div class="card" style="margin:2rem;width: 18rem;">
                @if($item->photo)
                    <img src="{{ asset('public/course/'.$item->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:200px; width:200px;">
                    @else
                        <img src="https://propertywiselaunceston.com.au/wp-content/themes/property-wise/images/no-image.png)" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Capacity: {{$item->capacity}}</li>
                    <li class="list-group-item">₱ {{$item->price}}</li>
                    </ul>
                    <a href="{{route('book-create',$item->course_id)}}">
                    <button type="button" class="btn btn-primary">
                    Book Appointment
                    </button>
                </a>
                </div>
            </div>
        </div>
        @endforeach
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
