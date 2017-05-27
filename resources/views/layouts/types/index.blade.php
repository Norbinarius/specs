@extends('layouts.app')


@section('title', trans('messages.types.list'))


@section('main')
    <a href="{{ route('layouts.index') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.gomain') }}</button>
    </a>
    @can('action', \App\Types::class)
    <a href="{{ route('types.create') }}">
        <button class="btn btn-primary big-btn">{{ trans('messages.create') }}</button>
    </a>
    @endcan
<table>
    <tr>
        <th>{{ trans('messages.types.name') }}<th>
    </tr>
@foreach ($types as $type)
    <tr>
        <td>{{ $type->name }}</td>
        @can('action', \App\Types::class)
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
        @endcan
    </tr>
@endforeach
</table>
<div class="text-center">
    {{$types->links()}}
</div>

@endsection
