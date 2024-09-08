@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('image', )
<img src="{{ Vite::asset('resources/images/errors/429-error.svg')}}" alt="Image for error 429 to many requests">
@stop
@section('message', __('Too Many Requests'))
@section('description' ,)
<p>
    Oops! Too many requests.
</p>

<div>
    <span class="mt-8 inline-block"><a type="button" href="{{ url()->previous() }}" class="btn btn-blue">Go Back</a></span>
    <span class="mt-8 inline-block"><a type="button" href="mailto:theguru@ravereview.guru?subject=Not%20found%20error" class="btn btn-outline">Contact Us</a></span>
</div>
@stop
