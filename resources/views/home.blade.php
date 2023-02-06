@extends('template')

@section('content')

<div class="container">
    <div class="card mt-3 mb-2">
        <div class="card-header text-kuning">
            Our Products
        </div>
        <div class="container">
        <div class="row mb-3">
            @foreach ($items as $item)
            <div class="col-sm-2 mt-3">
                <div class="card card-border" style="color: black">
                    <img src="{{asset("storage/item-image/$item->photo")}}" class="card-img-top img-thumbnail thumb" alt="">
                    <div class="card-body">
                        <p class="card-title text-truncate">{{$item->item_name}}</p>
                        <p class="card-text"><strong>IDR {{$item->price}}</strong></p>
                        <a class="text-white btn btn-block bg-dark" href="/detail/{{$item->item_id}}">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="float-right" style="margin: 2rem">
            {{$items->links()}}
        </div>
        </div>
    </div>
    </div>
@endsection
