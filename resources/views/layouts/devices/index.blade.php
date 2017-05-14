@extends('layouts.app')


@section('title', trans('messages.devices.list'))


@section('content')
@section('main')

    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    <a href="{{ route('devices.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>

<table>
    <tr>
        <th>{{ trans('messages.devices.company') }}</th>
        <th>{{ trans('messages.devices.model') }}</th>
        <th></th>
    </tr>
@foreach ($devices as $device)
    <tr>
        <td>{{ $device->company_name }}</td>
        <td>{{ $device->model_name }}</td>
        <td>
            <a href="{{ route('devices.edit', [
                'id' => $device->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
            <a href="{{ route('devices.delete', [
                'id' => $device->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
@endsection
