@extends('layouts.app')


@section('title', trans('messages.images'))


@section('main')

    <div class="text-center">
        <img alt="" src="{{ asset('/storage/images/' . $image->filename) }}" class="img-responsive img-thumbnail ">
    </div>
    <div class="text-center">
        @include('layouts.images.remove')
    </div>
@endsection