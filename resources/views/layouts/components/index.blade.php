@extends('layouts.base')

@section('title', trans('messages.components.list'))

@section('main')

<a href="{{ route('components.create') }}">
    {{ trans('messages.create') }}
</a>

<table>
@foreach ($components as $component)
    <tr>
        <td>{{ $component->name }}</td>
        @foreach($component->type as $t)
            <td> {{ $t->name }} </td>
        @endforeach
        <td>{{ $component->device_id }}</td>
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
