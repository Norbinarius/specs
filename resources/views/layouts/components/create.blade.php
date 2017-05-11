@extends('layouts.base')

@section('title',  trans('messages.creation'))

@section('main')

{{
    Form::model($entity, [
        'route' => 'components.store'
    ])
}}

    {{ Form::label( trans('messages.components.name')) }}
    {{ Form::text('name') }}

    {{ Form::label( trans('messages.components.type')) }}
    {{ Form::select('type_id', $type , null)}}

    {{ Form::label( trans('messages.components.device')) }}
    {{ Form::select('device_id', $device , null)}}

    {{ Form::submit() }}

{{ Form::close() }}

@endsection
