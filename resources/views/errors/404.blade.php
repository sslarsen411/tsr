@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('image', )
<img src="{{ Vite::asset('resources/images/errors/404-error.svg')}}" alt="Image for error 404 not found">
@stop
@section('message', __('Not Found'))
@section('description' ,)
<p class="my-5">
    We tried and tried, but we can’t find the page "<strong>{{ Request::segment(1)}}</strong>."
    The site administrator may have removed it, changed its location, or made it otherwise unavailable.
</p>
<p class="mb-5">
    You can return to the previous page with the <strong>Go Back</strong> button below, or contact us and we’ll point you in the right direction.
</p>
<div>
    <span class="mt-8 inline-block"><a type="button" href="{{ url()->previous() }}" class="btn btn-blue">Go Back</a></span>
    <span class="mt-8 inline-block"><a type="button" href="mailto:theguru@ravereview.guru?subject=Not%20found%20error" class="btn btn-outline">Contact Us</a></span>
</div>
@stop