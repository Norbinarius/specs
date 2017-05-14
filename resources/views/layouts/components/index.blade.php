@extends('layouts.app')

@section('title', trans('messages.components.list'))

@section('content')
@section('main')
    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    <a href="{{ route('components.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
<table>
    <tr>
        <th>{{ trans('messages.components.name') }}</th>
        <th>{{ trans('messages.components.type') }}</th>
        <th>{{ trans('messages.components.device') }}</th>
        <th colspan="2"></th>
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
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
        </td>
        <td>
            <a href="{{ route('components.delete', [
                'id' => $component->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
    </tr>
@endforeach
</table>
@endsection

@endsection
