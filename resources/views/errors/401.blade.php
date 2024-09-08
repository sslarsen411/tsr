@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('image', )
<img src="{{ Vite::asset('resources/images/errors/401-Error.svg')}}" alt="Image for error 401 unauthorized">
@stop
@section('message', __('Unauthorized'))
@section('description' ,)
<p>
    There is a lack of valid authentication credentials to access this resource.
</p>
<p>
    Your credentials are either missing or expired. Try logging in again.
</p>

<div>
    <span class="mt-8 inline-block"><a type="button" href="{{ url()->previous() }}" class="btn btn-blue">Go Back</a></span>
    <span class="mt-8 inline-block"><a type="button" href="mailto:theguru@ravereview.guru?subject=Not%20found%20error" class="btn btn-outline">Contact Us</a></span>
</div>
@stop
