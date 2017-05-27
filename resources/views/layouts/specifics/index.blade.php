@extends('layouts.app')


@section('title', trans('messages.specifics.list'))


@section('main')
<a href="{{ route('layouts.index') }}">
    <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
</a>
@can('action', \App\Specifics::class)
<a href="{{ route('specifics.create') }}">
    <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
</a>
@endcan
<table>
    <tr>
        <th>{{ trans('messages.specifics.name') }}</th>
        <th>{{ trans('messages.specifics.component') }}</th>
        <th>{{ trans('messages.specifics.component_other') }}</th>
        @can('action', \App\Specifics::class)
        <th></th>
        @endcan
    </tr>
@foreach ($specifics as $specific)
    <tr>
        <td>{{ $specific->name }}</td>
        <td>{{ $specific->component->name }}</td>
        <td>{{ $specific->component_other->name}}</td>
        @can('action', \App\Specifics::class)
        <td>
            <a href="{{ route('specifics.edit', [
                'id' => $specific->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
            <a href="{{ route('specifics.delete', [
                'id' => $specific->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
        @endcan
    </tr>
@endforeach
</table>
<div class="text-center">
    {{$specifics->links()}}
</div>
@endsection
