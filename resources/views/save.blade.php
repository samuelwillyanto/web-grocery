@extends('template')

@section('content')
<center>
<div class="container mb-5">
       <!-- card2 -->
       <div class="card card-circle">
          <div class="card-body center-circle">
             <h5 class="card-title">Amazing E-Grocery</h5>
             <p class="card-text">Your Profile Update Saved!</p>
             <a href="{{ route('home') }}" class="text-dark btn btn-primary">Home</a>
          </div>
       </div>
 </div>
</center>

@endsection
