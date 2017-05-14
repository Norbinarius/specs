@extends('layouts.app')


@section('title', trans('messages.types.list'))


@section('content')
@section('main')
    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    <a href="{{ route('types.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
<table>
    <tr>
        <th>{{ trans('messages.types.name') }}<th>
    </tr>
@foreach ($types as $type)
    <tr>
        <td>{{ $type->name }}</td>
        <td>
            <a href="{{ route('types.edit', [
                'id' => $type->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
            <a href="{{ route('types.delete', [
                'id' => $type->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
    </tr>
@endforeach
</table>

@endsection
@endsection
