@extends('layouts.app')


@section('title',  trans('messages.edition'))


@section('content')
@section('main')

{{
    Form::model($entity, [
        'method' => 'PUT',
        'route' => [
            'specifics.update',
            $entity->id
        ]
    ])
}}
<div class="form-horizontal">
<div class="form-group">
    <div class="col-md-2 col-md-offset-2">
            {{ Form::label(null, trans('messages.specifics.name')) }}
    </div>
    <div class="col-md-6">
            {{ Form::text('name', $entity->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-2 col-md-offset-2">
            {{ Form::label(null, trans('messages.specifics.component')) }}
    </div>
     <div class="col-md-6">
            {{ Form::select('component_id', $components , null, ['class' => 'form-control'])}}
     </div>
</div>
<div class="form-group">
    <div class="col-md-2 col-md-offset-2">
            {{ Form::label(null, trans('messages.specifics.component_other')) }}
    </div>
    <div class="col-md-6">
            {{ Form::select('component_other__id', $components , null, ['class' => 'form-control'])}}
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