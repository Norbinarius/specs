@extends('layouts.base')

@section('title', trans('messages.devices.list'))

@section('main')

<a href="{{ route('devices.create') }}">
    {{ trans('messages.create') }}
</a>

<table>
    <tr>
        <td><b>{{ trans('messages.devices.company') }}</b></td>
        <td><b>{{ trans('messages.devices.model') }}</b></td>
    </tr>
@foreach ($devices as $device)
    <tr>
        <td>{{ $device->company_name }}</td>
        <td>{{ $device->model_name }}</td>
        <td>
            <a href="{{ route('devices.edit', [
                'id' => $device->id
            ]) }}">
                {{ trans('messages.edit') }}
            </a>
        </td>
        <td>
            <a href="{{ route('devices.delete', [
                'id' => $device->id
            ]) }}">
                {{ trans('messages.delete') }}
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
