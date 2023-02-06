@extends('template')

@section('content')
<center>
<div class="container mb-5">
       <!-- card2 -->
       <div class="card card-circle">
          <div class="card-body center-circle">
             <h5 class="card-title">Amazing E-Grocery</h5>
             <p class="card-text">Log Out Success!</p>
             <a href="{{ route('login_form') }}" class="text-dark btn btn-primary">Login Here</a>
          </div>
       </div>
 </div>
</center>

@endsection
