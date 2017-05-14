@extends('layouts.app')

@section('title', trans('messages.admin'))

@section('content')
@section('main')

<div class="form-horizontal">
    <div class="form-group">
        <div class="text-center">
            <a href="{{ route('specifics.index') }}">
                <button class="btn btn-primary btn-main"> {{ trans('messages.specifics') }}</button>
            </a>
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            <a href="{{ route('components.index') }}">
                <button class="btn btn-primary btn-main"> {{ trans('messages.components') }}</button>
            </a>
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            <a href="{{ route('types.index') }}">
                <button class="btn btn-primary btn-main"> {{ trans('messages.types') }}</button>
            </a>
        </div>
    </div>
    <div class="form-group">
        <div class="text-center">
            <a href="{{ route('devices.index') }}">
                <button class="btn btn-primary btn-main"> {{ trans('messages.devices') }}</button>
            </a>
        </div>
    </div>
</div>
@endsection
@endsection