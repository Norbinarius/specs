@extends('layouts.app')

@section('title',  trans('messages.creation'))

@section('main')

    {{
    Form::model (
    $image, [
        'files' => true,
        'method' => 'POST',
        'route' => [
            'images.create'
        ]
        ])

     }}
    <div class="form-horizontal">
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2">
                {{ Form::label( trans('messages.image.name')) }}
            </div>
            <div class="col-md-6">
                {{ Form::text('image_name', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-md-offset-2">
            {{ Form::label ('file', __ ('messages.image.file' ))}}
            </div>
            <div class="col-md-6">
            {{
            Form:: file('file', [
                'aria-describedby' => 'file-help',
                'class' => 'btn-block',
                ])
            }}
            <small id= "file-help" class="form-text text-muted">
                {{ __('messages.image.file.mimes' ) }}
            </small>
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