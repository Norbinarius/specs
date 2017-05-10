@extends('layouts.base')

@section('title',  trans('messages.edition'))

@section('main')

{{
    Form::model($entity, [
        'method' => 'PUT',
        'route' => [
            'components.update',
            $entity->id
        ]
    ])
}}

    {{ Form::label( trans('messages.components.name')) }}
    {{ Form::text('name') }}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
