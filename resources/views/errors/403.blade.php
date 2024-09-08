@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('image', )
<img src="{{ Vite::asset('resources/images/errors/403-Error.svg')}}" alt="Image for error 403">
@stop
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('description' ,)
<p>
    You do not have permission to access this resource.
</p>
<div>
    <span class="mt-8 inline-block"><a type="button" href="{{ url()->previous() }}" class="btn btn-blue">Go Back</a></span>
    <span class="mt-8 inline-block"><a type="button" href="mailto:theguru@ravereview.guru?subject=Not%20found%20error" class="btn btn-outline">Contact Us</a></span>
</div>
@stop