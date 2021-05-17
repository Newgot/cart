@extends('master')


@section('title', trans('messages.add'))

@section('content')
    <form class="d-flex flex-column col-4 add-product" action="{{ route('product.addRequest') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @lang('messages.name') : <input type="text" name="nameProduct" value="{{old('nameProduct')}}">
        @lang('messages.image') : <input type="file" name="image" value="{{old('nameProduct')}}">
        @lang('messages.description') : <input type="text" name="description" value="{{old('description')}}">
        @lang('messages.price') : <input type="text" name="price" value="{{old('price')}}">
        @lang('messages.category') : 
        <select name="idCategory">
            @foreach ($categories as $category)
                <option value="{{$category->idCategory}}">{{$category->nameCategory}}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">@lang('messages.add')</button>
    </form>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection 