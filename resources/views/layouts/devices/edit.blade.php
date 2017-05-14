@extends('layouts.app')

@section('title',  trans('messages.edition'))

@section('content')
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
    <div class="form-horizontal">
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2">
                {{ Form::label( trans('messages.devices.company')) }}
            </div>
            <div class="col-md-6">
                {{ Form::text('company_name', $entity->company_name, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2">
                {{ Form::label( trans('messages.devices.model')) }}
            </div>
            <div class="col-md-6">
                {{ Form::text('model_name', $entity->model_name, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                {{ Form::submit(trans('messages.confirm'), ['class' => 'btn btn-primary'])}}
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
@endsection