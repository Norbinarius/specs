@extends('layouts.base')

@section('title',  trans('messages.deletion'))

@section('main')
    <p>Вы уверены что хотите удалить запись?</p>
{{
    Form::model($entity, [
        'method' => 'DELETE',
        'route' => [
            'specifics.destroy',
            'id' => $entity->id
        ]
    ])
}}

    {{ Form::submit(trans('messages.confirm')) }}

{{ Form::close() }}

@endsection
