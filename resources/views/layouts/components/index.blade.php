@extends('layouts.base')

@section('title', trans('messages.components.list'))

@section('main')
<a href="{{ route('components.create') }}">
    {{ trans('messages.create') }}
</a>
<table>
    <tr>
        <td><b>{{ trans('messages.components.name') }}</b></td>
        <td><b>{{ trans('messages.components.type') }}</b></td>
        <td><b>{{ trans('messages.components.device') }}</b></td>
    </tr>
@foreach ($components as $component)
    <tr>
        <td>{{ $component->name }}</td>
        <td>{{ $component->type->name }}</td>
        <td>{{ $component->device->company_name.' '.$component->device->model_name }}</td>
        <td>
            <a href="{{ route('components.edit', [
                'id' => $component->id
            ]) }}">
                {{ trans('messages.edit') }}
            </a>
        </td>
        <td>
            <a href="{{ route('components.delete', [
                'id' => $component->id
            ]) }}">
                {{ trans('messages.delete') }}
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
