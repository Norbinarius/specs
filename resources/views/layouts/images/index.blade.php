@extends('layouts.app')


@section('title', trans('messages.images'))


@section('main')
    @can('action', \App\Image::class)
        <a href="{{ route('devices.index') }}">
            <button class="btn btn-primary big-btn">{{ trans('messages.devices') }}</button>
        </a>
    @endcan
    @can('action', \App\Image::class)
        <a href="{{ route('images.add') }}">
            <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
        </a>
    @endcan
    <div class="container-fluid">

        <div class="row">
            @foreach ($images as $image)
                <figure class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                    <a href="{{ route('images.show', [$image->id]) }}">
                        <img alt= "" src= "{{ asset('/storage/images/' . $image->filename) }}" class="img-responsive img-thumbnail">
                    </a>
                    <figcaption class="text-center">
                        {{ $image->image_name }}
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{$images->links()}}
    </div>

@endsection