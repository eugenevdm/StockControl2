@extends('app')

@section('content')

    <h3>Edit location '{{ $location->name }}'</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/location/">Location</a></li>
        <li class="active">Edit Location</li>
    </ol>

    {!! Form::model($location, ['method' => 'PATCH', 'route' => ['location.update', $location->id]]) !!}
        @include('location/partials/_form', ['submit_text' => 'Save'])
    {!! Form::close() !!}
    
@endsection