@extends('layouts.app')


@section('title', trans('messages.devices.list'))


@section('content')
@section('main')

    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    @can('action', \App\Devices::class)
    <a href="{{ route('devices.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
    @endcan
<table>
    <tr>
        <th>{{ trans('messages.devices.company') }}</th>
        <th>{{ trans('messages.devices.model') }}</th>
        @can('action', \App\Devices::class)
            <th></th>
        @endcan
    </tr>
@foreach ($devices as $device)
    <tr>
        <td>{{ $device->company_name }}</td>
        <td>{{ $device->model_name }}</td>
        @can('action', \App\Devices::class)
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
        @endcan
    </tr>
@endforeach
</table>
    <div class="text-center">
        {{$devices->links()}}
    </div>

@endsection
@endsection
