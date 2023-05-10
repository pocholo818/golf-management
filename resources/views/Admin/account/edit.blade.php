@extends('layouts.admin')

@section('content')

<div class="modal-header" >
    <a href="{{route('account')}}">
    <button type="button" class="btn btn-outline-danger" >Back</button>
    </a>
</div>
            <form action="{{route('update_user', $user->id)}}" method="post" enctype="multipart/form-data" class="row g-3">
                {!! csrf_field() !!}
                @method("PUT")
                
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$user->name}}" >
                </div>
                <div class="">
                    <label for="formFile" class="form-label">Email</label>
                    <input type="email" name="email" step="any" class="form-control" value="{{ $user->email }}" >
                </div>
                <div class="">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select id="inputState" class="form-control form-select" value="{{ $user->role }}" name="role">
                        <option></option>
                        <option value="finance" @if($user->role == 'finance') selected @endif>Finance</option>
                        <option value="kiosk" @if($user->role == 'kiosk') selected @endif>Kiosk</option>
                        <option value="services" @if($user->role == 'services') selected @endif>Services</option>
                        <option value="merchandise" @if($user->role == 'merchandise') selected @endif>Merchandise</option>
                    </select>
                </div>

                {{-- <div class="">
                    <label for="formFile" class="form-label">Password</label>
                    <input type="password" name="password" step="any" class="form-control" >
                </div> --}}

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-success w-100">Update</button>
                </div>
            </form>

@endsection