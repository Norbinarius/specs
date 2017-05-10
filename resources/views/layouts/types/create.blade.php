@extends('layouts.base')

@section('title',  trans('messages.creation'))

@section('main')

{{
    Form::model($entity, [
        'route' => 'types.store'
    ])
}}

    {{ Form::label( trans('messages.types.name')) }}
    {{ Form::text('name') }}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
