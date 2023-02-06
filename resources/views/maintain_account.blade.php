@extends('template')

@section('content')
<div class="p-5">
<div class="container text-center">
    <p class="fw-bold fs-2">Account Maintenance</p>
    <div class="row justify-content-md-center bg-secondary py-3 shadow">
        <div class="col-4 fw-bold fs-5 text-white">Name</div>
        <div class="col fw-bold fs-5 text-white">Role</div>
        <div class="col-4 fw-bold fs-5 text-white">Action</div>
    </div>
    <div>
        @foreach ($users as $user)
            @php
                if($user->role_id == '1'){
                    $role_name = 'User';
                } else{
                    $role_name = 'Admin';
                }
            @endphp
            <div class="row justify-content-md-center align-items-center border my-4 py-2 shadow">
                <div class="col-4 fw-bold fs-5">
                    <div class="d-flex align-items-center p-2">
                        <p class="mx-4 my-0 fw-bold fs-5">{{$user->first_name}} {{$user->last_name}}</p>
                    </div>
                </div>
                <div class="col">
                    <p class="m-0 fw-bold fs-5">{{$role_name}}</p>
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('update_role_form', ["user_id" => $user->id])}}" class="bg-primary shadow rounded text-white py-2 px-2 border shadow text-decoration-none mr-2">Update Role</a>
                        <form action="{{route('delete_account')}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit" class="bg-danger shadow rounded text-white py-2 px-3 border shadow">Delete</button>
                        </form>
                    </div>
                </div>

            </div>

        @endforeach
    </div>
    <div class="text-danger fs-5 mb-3">
        @if ($errors->has('error'))
            <p>{{$errors->first('error')}}</p>
        @endif
    </div>
    <div class="float-right" style="margin: 2rem">
        {{$users->links()}}
    </div>
</div>
</div>
@endsection
