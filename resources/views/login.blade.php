@extends('template')

@section('content')
<div class="p-5">
    <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <p class="fw-bold fs-3">Sign in to your account</p>
        <div class="shadow p-3 text-start">
            <form action="{{route('login_logic')}}" method="POST">
                @csrf
                <p class="my-2">Email Address</p>
                <input type="email" name="email" id="email" class="w-100 mb-2" value="{{Cookie::get('remember')?? ""}}"/>
                @if($errors->has('email'))
                    <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('email')}}</div>
                @endif
                <p class="my-2">Password</p>
                <input type="password" name="password" id="password" class="w-100 mb-2"/>
                @if($errors->has('password'))
                    <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('password')}}</div>
                @endif
                <div class="my-2">
                    <input type="checkbox" name="remember" id="remember"/>
                    <label for="remember">Remember Email</label>
                </div>
                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="text-danger fs-6 fw-light mb-3">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
                @endif
                <button class="bg-primary text-white rounded w-100 py-2 border-0 my-2">Sign In</button>
                <p class="text-center mt-3">
                    Don't have an account?
                    <a href="{{route('register_form')}}"><u>Register Here</u></a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
