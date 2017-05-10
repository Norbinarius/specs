@extends('layouts.base')

@section('title',  trans('messages.creation'))

@section('main')

{{
    Form::model($entity, [
        'route' => 'devices.store'
    ])
}}

    {{ Form::label( trans('messages.devices.company')) }}
    {{ Form::text('company_name') }}

    {{ Form::label( trans('messages.devices.model')) }}
    {{ Form::text('model_name') }}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
