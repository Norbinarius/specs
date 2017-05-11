@extends('layouts.base')

@section('title', trans('messages.specifics.list'))

@section('main')
<a href="{{ route('specifics.create') }}">
    {{ trans('messages.create') }}
</a>
<table>
    <tr>
        <td><b>{{ trans('messages.specifics.name') }}</b></td>
        <td><b>{{ trans('messages.specifics.component') }}</b></td>
        <td><b>{{ trans('messages.specifics.component_other') }}</b></td>
    </tr>
@foreach ($specifics as $specific)
    <tr>
        <td>{{ $specific->name }}</td>
        <td>{{ $specific->component->name }}</td>
        <td>{{ $specific->component_other->name}}</td>
        <td>
            <a href="{{ route('specifics.edit', [
                'id' => $specific->id
            ]) }}">
                {{ trans('messages.edit') }}
            </a>
        </td>
        <td>
            <a href="{{ route('specifics.delete', [
                'id' => $specific->id
            ]) }}">
                {{ trans('messages.delete') }}
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
