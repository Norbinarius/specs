@extends('layouts.base')

@section('title', trans('messages.types.list'))

@section('main')

<a href="{{ route('types.create') }}">
    {{ trans('messages.create') }}
</a>

<table>
@foreach ($types as $type)
    <tr>
        <td>{{ $type->name }}</td>
        <td>
            <a href="{{ route('types.edit', [
                'id' => $type->id
            ]) }}">
                {{ trans('messages.edit') }}
            </a>
        </td>
        <td>
            <a href="{{ route('types.delete', [
                'id' => $type->id
            ]) }}">
                {{ trans('messages.delete') }}
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
