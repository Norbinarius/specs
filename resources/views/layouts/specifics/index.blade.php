@extends('layouts.app')


@section('title', trans('messages.specifics.list'))


@section('content')
@section('main')
<a href="{{ route('layouts.index') }}">
    <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
</a>
<a href="{{ route('specifics.create') }}">
    <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
</a>
<table>
    <tr>
        <th>{{ trans('messages.specifics.name') }}</th>
        <th>{{ trans('messages.specifics.component') }}</th>
        <th>{{ trans('messages.specifics.component_other') }}</th>
        <th colspan="2"></th>
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
                <button class="btn btn-primary">{{ trans('messages.edit') }}</button>
            </a>
        </td>
        <td>
            <a href="{{ route('specifics.delete', [
                'id' => $specific->id
            ]) }}">
                <button class="btn btn-primary">{{ trans('messages.delete') }}</button>
            </a>
        </td>
    </tr>
@endforeach
</table>
@endsection
@endsection
