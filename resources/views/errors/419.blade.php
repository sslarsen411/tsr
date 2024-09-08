@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('image', )
<img src="{{ Vite::asset('resources/images/errors/419-status-code.png')}}" alt="Image for error 419 expired">
@stop
@section('message', __('Page Expired'))
@section('description' ,)
<p>
    This session has expired.
</p>

<div>
    <span class="mt-8 inline-block"><a type="button" href="{{ url()->previous() }}" class="btn btn-blue">Go Back</a></span>
    <span class="mt-8 inline-block"><a type="button" href="mailto:theguru@ravereview.guru?subject=Not%20found%20error" class="btn btn-outline">Contact Us</a></span>
</div>
@stop
