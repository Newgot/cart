@extends('master')

@section('title', trans('messages.addCategory'))
    
@section('content')
    <form class="d-flex flex-column col-4 add-category"  action="{{route('category.addRequest')}}" method="POST">
        @csrf
        <p>@lang('messages.name') :</p>
        <input type="text" name='nameCategory' value="{{old('nameCategory')}}">
        <button class="btn btn-primary" type="submit">@lang('messages.add')</button>
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