@extends('layouts.base')

@section('title',  trans('messages.edition'))

@section('main')

{{
    Form::model($entity, [
        'method' => 'PUT',
        'route' => [
            'devices.update',
            $entity->id
        ]
    ])
}}

    {{ Form::label( trans('messages.devices.company')) }}
    {{ Form::text('company_name') }}

    {{ Form::label( trans('messages.devices.model')) }}
    {{ Form::text('model_name') }}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
