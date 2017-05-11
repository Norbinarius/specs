@extends('layouts.base')

@section('title',  trans('messages.creation'))

@section('main')

{{
    Form::model($entity, [
        'route' => 'specifics.store'
    ])
}}

    {{ Form::label( trans('messages.specifics.name')) }}
    {{ Form::text('name') }}

    {{ Form::label( trans('messages.specifics.component')) }}
    {{ Form::select('component_id', $components , null)}}

    {{ Form::label( trans('messages.specifics.component_other')) }}
    {{ Form::select('component_other__id', $components , null)}}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
