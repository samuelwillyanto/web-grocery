@extends('template')

@section('content')
<div class="p-5">
    @if(sizeof($orders) == 0)
        <p class="text-center m-0 fw-bold fs-5">Your cart is empty</p>
    @else
        <div class="container text-center">
            <p class="fw-bold fs-2">Your Cart</p>
            <div class="row justify-content-md-center bg-secondary py-3 shadow">
                <div class="col-4 fw-bold fs-5 text-white">Product</div>
                <div class="col fw-bold fs-5 text-white">Price</div>
                <div class="col-4 fw-bold fs-5 text-white">Action</div>
            </div>
            <div>
                @php
                    $total = 0;
                @endphp
                @foreach ($orders as $o)
                    @php
                        $total += $o->items->price;
                    @endphp
                    <div class="row justify-content-md-center align-items-center border my-4 py-2 shadow">
                        <div class="col-4 fw-bold fs-5">
                            <div class="d-flex align-items-center p-2">
                                <img src="{{asset("storage/item-image/".$o->items->photo)}}" alt="" class="rounded-circle" style="width: 60px">
                                <p class="mx-4 my-0 fw-bold fs-5">{{$o->items->item_name}}</p>
                            </div>
                        </div>
                        <div class="col">
                            <p class="m-0">IDR {{$o->items->price}}</p>
                        </div>
                        <div class="col-4">
                            <form action="{{route('delete_item_cart')}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="order_id" value="{{$o->order_id}}">
                                <button type="submit" class="bg-danger shadow rounded text-white py-2 px-3 border shadow">Delete</button>
                            </form>
                        </div>

                    </div>

                @endforeach
            </div>
            <div class="text-danger fs-5 mb-3">
                @if ($errors->has('error'))
                    <p>{{$errors->first('error')}}</p>
                @endif
            </div>
            <form action={{route('checkout')}} method="POST">
                @csrf
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="text-decoration-none bg-primary text-white fw-bold py-2 px-3 rounded shadow">Check Out</button>
                    <p class="fw-bold fs-5 m-0">Total : IDR {{$total}}</p>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection
