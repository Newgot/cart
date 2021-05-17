@extends('master')

@section('title', trans('messages.basket'))


@section('content')
    <div class="row">
        @foreach ($products as $product)
        <div class="col-3">
            <div class="product border" id='{{ $product['id'] }}'>
                <h3>{{ $product['name'] }}</h3>
                <img src="/storage/images/{{ $product['attributes']['image'] }}" alt="">
                <h4>{{ $product['price'] }} @lang('messages.currency')</h4>
                <div class="d-flex justify-content-between" data-id="{{ $product['id'] }}">
                    <div class="d-flex align-items-center">
                        <div class="btn product-btn btn-danger" 
                        data-id="{{ $product['id'] }}"
                        data-url="{{ route('addToBusket') }}">
                            +
                        </div>
                        <div class="qty">
                            <p>{{ $product['quantity'] }}</p>
                        </div>
                        <div class="btn product-btn btn-danger" 
                        data-id="{{ $product['id'] }}"
                        data-url="{{ route('delToBusket') }}">
                            -
                        </div>
                    </div>
                    
                    <div class="btn btn-danger product-btn " 
                    data-id="{{$product['id']}}"
                    data-url={{route('removeToBusket')}}>
                        @lang('messages.remove')
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <h3>@lang('messages.sum') {{ $allPrice }} @lang('messages.currency')</h3>
    </div>
    <form action="{{route('sendMail')}}" method="POST" class="mail">
        @csrf
        <p>
            @lang('messages.f_name'): 
            <input type="text" name="f_name" value="{{old('f_name')}}">
        </p>
        <p>
            @lang('messages.l_name'):
            <input type="text" name="l_name" value="{{old('l_name')}}">
        </p>
        <p>
            @lang('messages.patronymic'):
            <input type="text" name="patronymic" value="{{old('patronymic')}}">
        </p>
        <p>
            @lang('messages.tel'):
            <input type="text" name="tel" value="{{old('tel')}}">
        </p>
        <p>
            @lang('messages.comment')
            <input type="text" name="comment" value="{{old('comment')}}">
        </p>
        <div class="row">
            <p>@lang('messages.mail') :</p>
            <input class="col-4" name="mail" type="text" value="{{old('mail')}}">
        </div>
        <button class="btn btn-primary" type="submit">@lang('messages.toMail')</button>
    </form>
    @if ($errors->any())
    <br>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection
