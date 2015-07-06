@extends('app')

@section('content')

    <h3>Movements</h3>

    <table class="table table-hover">
    <thead>
    <tr>
        <th>Date</th>
        <th>Item</th>
        <th>User</th>
        <th>Before</th>
        <th>After</th>
        <th>Cost</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody class="table">

    @foreach ($movements as $movement)
        <tr>
            <td>{{ $movement->created_at }}</td>
            <td>{{ $movement->stock_id }}</td>
            <td>{{ $movement->user_id }}</td>
            <td>{{ $movement->before }}</td>
            <td>{{ $movement->after }}</td>
            <td>{{ $movement->cost }}</td>
            <td>{{ $movement->reason }}</td>
        </tr>
    @endforeach

    </tbody>
    </table>

@endsection