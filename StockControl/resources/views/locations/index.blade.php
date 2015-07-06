@extends('app')

@section('content')

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
            <td>Edit</td>
        </tr>
    @endforeach

    </tbody>
    </table>

@endsection