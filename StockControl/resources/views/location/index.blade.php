@extends('app')

@section('content')

    <h3>Locations</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Locations</li>
    </ol>

    <table class="table table-hover">
    <thead>
    <tr>
        <th>Location</th>
        <th></th>
    </tr>
    </thead>
    <tbody class="table">

    @foreach ($locations as $location)
        <tr>
            <td>{{ $location->name }}</td>
            <td width="1%">
                {!! link_to_route('location.edit', 'Edit', array($location->id), array('class' => 'btn btn-info')) !!}
            </td>
        </tr>
    @endforeach

    </tbody>
    </table>

@endsection