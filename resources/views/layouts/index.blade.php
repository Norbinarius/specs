@extends('layouts.base')

@section('title', trans('messages.main'))

@section('main')

<table>
    <tr>
        <td><a href="{{ route('specifics.index') }}">
                {{ trans('messages.specifics') }}
            </a>
        </td>
    </tr>
    <tr>
        <td><a href="{{ route('components.index') }}">
                {{ trans('messages.components') }}
            </a>
        </td>
    </tr>
    <tr>
        <td><a href="{{ route('types.index') }}">
                {{ trans('messages.types') }}
            </a>
        </td>
    </tr>
    <tr>
        <td><a href="{{ route('devices.index') }}">
                {{ trans('messages.devices') }}
            </a>
        </td>
    </tr>
</table>

@endsection
