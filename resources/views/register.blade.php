@extends('template')

@section('content')
<div class="p-5">
    <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <p class="fw-bold fs-3">Register</p>
        <div class="shadow p-3 text-start">
            <form action="{{ route('register_logic') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">First Name</p>
                        <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="w-100 mb-2"/>
                        @if($errors->has('fisrt_name'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('first_name')}}</div>
                        @endif
                    </div>
                    <div>
                        <p class="my-2">Last Name</p>
                        <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="w-100 mb-2"/>
                        @if($errors->has('last_name'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('last_name')}}</div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">Email Address</p>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="w-100 mb-2"/>
                        @if($errors->has('email'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                    <div class="me-4 mt-2">
                        <label for="inputRole">Role</label>
                        <select class="w-100" id="inputRole" name="role_id" class="form-control" required>
                          <option value="1">User</option>
                          <option value="2">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">Password</p>
                        <input type="password" name="password" id="password" class="w-100 mb-2"/>
                        @if($errors->has('password'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('password')}}</div>
                        @endif
                    </div>
                    <div>
                        <p class="my-2">Confirm Password</p>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-100 mb-2"/>
                        @if($errors->has('password_confirmation'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('password_confirmation')}}</div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">Gender</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" value="1" id="male">
                                <label class="form-check-label" for="flexRadioDefault1">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender_id" value="2" id="female">
                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                            </div>
                            @if($errors->has('gender_id'))
                                <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('gender_id')}}</div>
                            @endif
                    </div>
                    <div class="">
                        <p class="my-2">Display Picture</p>
                        <input type="file" class="form-control" id="display_picture_link" name="display_picture_link" />
                        @if($errors->has('display_picture_link'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('display_picture_link')}}</div>
                        @endif
                    </div>
                </div>
                <div class="border border-black bg-dark my-3 shadow"></div>
                <div class="d-flex justify-content-end">
                    <button id="register" name="register" class="bg-primary py-2 px-3 text-white shadow border-0 rounded">Submit</button>
                </div>
            </form>
        </div>
        <p class="text-center mt-3">
            Have an account?
            <a href="{{route('login_form')}}"><u>Login Here</u></a>
        </p>
    </div>
</div>
@endsection
