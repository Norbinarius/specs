@extends('layouts.app')


@section('title', trans('messages.devices.list'))


@section('main')

    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    @can('action', \App\Devices::class)
        <a href="{{ route('images.index') }}">
            <button class="btn btn-primary big-btn">{{ trans('messages.images') }}</button>
        </a>
    @endcan
    @can('action', \App\Devices::class)
    <a href="{{ route('devices.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
    @endcan
<table>
    <tr>
        <th>{{ trans('messages.devices.company') }}</th>
        <th>{{ trans('messages.devices.model') }}</th>
        <th>{{ trans('messages.image') }}</th>
        @can('action', \App\Devices::class)
            <th></th>
        @endcan
    </tr>
@foreach ($devices as $device)
    <tr>
        <td>{{ $device->company_name }}</td>
        <td>{{ $device->model_name }}</td>
        <td>
            @if(is_null($device->image_id))
                {{ trans('messages.images.null') }}
            @else
            <details>
            <summary>{{ trans('messages.show') }}</summary>
            <figure class="images">
                <a href="{{ route('images.show', [$device->image->id]) }}">
            <img alt= "" src= "{{ asset('/storage/images/' . $device->image->filename) }}" class="img-responsive img-thumbnail">
            </a>
            </figure>
            </details>
            @endif
        </td>
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
