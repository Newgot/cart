@extends('master')

@section('title', trans('messages.home'))

@section('content')
    @foreach ($catProducts as $nameCategory => $products)
        <h2>{{$nameCategory}}</h2>
        <div class="col-12 row home-products">
            @foreach ($products as $product)
                <div class="col-3">
                    <div class="product border" id='{{$product['idProduct']}}'>
                        <h3>{{$product['nameProduct']}}</h3>
                        <img src="/storage/images/{{$product['image']}}" alt="">
                        <p>{{$product['description']}}</p>
                        <h4>{{$product['price']}} @lang('messages.currency')</h4>
                        <div class="btn btn-danger product-btn" 
                        data-id="{{$product['idProduct']}}"
                        data-url={{route('addToBusket')}}>
                            <span>@lang('messages.bue')</span>
                        </div>
                        <div class="btn btn-danger product-btn" 
                        data-id="{{$product['idProduct']}}"
                        data-url={{route('removeToBusket')}}>
                            <span>@lang('messages.remove')</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
