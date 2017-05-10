@extends('layouts.base')

@section('title',  trans('messages.edition'))

@section('main')

{{
    Form::model($entity, [
        'method' => 'PUT',
        'route' => [
            'types.update',
            $entity->id
        ]
    ])
}}

    {{ Form::label( trans('messages.types.name')) }}
    {{ Form::text('name') }}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
