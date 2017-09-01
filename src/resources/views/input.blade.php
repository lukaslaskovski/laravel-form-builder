@extends('form::layouts.input')

@section('input')
    <input
        @if (isset($parameters['id']))
            id="{!! $parameters['id'] !!}"
        @endif

        @if (isset($parameters['input-classes']))
            class="{!! $parameters['input-classes'] !!}"
        @endif

        name="{!! $name !!}"
        value="{!! $value !!}"

        @if (isset($parameters['type']))
            type="{!! $parameters['type'] !!}"
        @endif

        @if (isset($parameters['required']) && $parameters['required'] === true)
            required
        @endif

        @if (isset($parameters['autofocus']) && $parameters['autofocus'] === true)
            autofocus
        @endif

        @if (isset($parameters['disabled']) && $parameters['disabled'] === true)
            disabled
        @endif

        @if (isset($parameters['readonly']) && $parameters['readonly'] === true)
            readonly
        @endif
    >
{{--For multiple layout using--}}
@overwrite