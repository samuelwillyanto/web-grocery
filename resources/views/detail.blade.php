@extends('template')

@section('content')
<div class="container p-5">
    <div class="card card-detail">
        <div class="container-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{asset("storage/item-image/$product_detail->photo")}}" /></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $product_detail->item_name }}</h3>
                    <h5><strong>Deskripsi</strong></h5>
                    <p class="product-description">{{ $product_detail->item_desc}}</p>
                    <h5><strong>Harga :</strong></h5>
                    <p>IDR {{ $product_detail->price }}</p>

                    <form action="{{route('add_to_cart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="item_id" value="{{$product_detail->item_id}}">
                        <input type="hidden" name="price" value="{{$product_detail->price}}">
                        <div class="action">
                            <button class="btn btn-default btn-primary text-white" type="submit">Buy<i class="ml-2 fa fa-cart"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
