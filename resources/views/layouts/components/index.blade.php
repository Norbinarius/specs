@extends('layouts.app')

@section('title', trans('messages.components.list'))

@section('main')
    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    @can('action', \App\Components::class)
    <a href="{{ route('components.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
    @endcan
<table>
    <tr>
        <th>{{ trans('messages.components.name') }}</th>
        <th>{{ trans('messages.components.type') }}</th>
        <th>{{ trans('messages.components.device') }}</th>
        @can('action', \App\Components::class)
            <th></th>
        @endcan
    </tr>
@foreach ($components as $component)
    <tr>
        <td>{{ $component->name }}</td>
        <td>{{ $component->type->name }}</td>
        <td>{{ $component->device->company_name.' '.$component->device->model_name }}</td>
        @can('action', \App\Components::class)
        <td>
            <a href="{{ route('components.edit', [
                'id' => $component->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
            <a href="{{ route('components.delete', [
                'id' => $component->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
        @endcan
    </tr>
@endforeach
</table>
    <div class="text-center">
        {{$components->links()}}
    </div>
@endsection
