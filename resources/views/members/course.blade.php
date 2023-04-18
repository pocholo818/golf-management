@extends('layouts.member')

@section('content')
<div class="container">
            <div class="live-preview">
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
            </div>
</div>
@endsection
