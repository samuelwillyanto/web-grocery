@extends('template')

@section('content')
<div class="p-5">
    <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <p class="fw-bold fs-3">Update Role</p>
        <div class="shadow p-3 text-start">
            <form action="{{route('update_role')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">First Name</p>
                        <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" class="w-100 mb-2"/ disabled>
                        @if($errors->has('fisrt_name'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('first_name')}}</div>
                        @endif
                    </div>
                    <div>
                        <p class="my-2">Last Name</p>
                        <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" class="w-100 mb-2"/ disabled>
                        @if($errors->has('last_name'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('last_name')}}</div>
                        @endif
                    </div>
                </div>
                <div class="me-4 mt-2">
                    <label for="inputRole">Role</label>
                    <select class="w-100" id="inputRole" name="role_id" class="form-control" required>
                      <option value="1" {{$user->role_id == "1" ? 'selected' : ''}}>User</option>
                      <option value="2" {{$user->role_id == "2" ? 'selected' : ''}}>Admin</option>
                    </select>
                </div>

                <div class="d-flex justify-content-start">
                    <div class="me-4">
                        <p class="my-2">Email Address</p>
                        <input type="email" name="email" id="email" value="{{$user->email}}" class="w-100 mb-2"/ disabled>
                        @if($errors->has('email'))
                            <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button id="update" name="update" class="bg-primary py-2 px-3 text-white shadow border-0 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
