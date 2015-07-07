@extends('app')

@section('content')

    <h3>Inventories</h3>

    <ol class="breadcrumb">
        <li class="active">Inventories</li>
    </ol>

    @if ( !$inventories->count() )
        There are nothing in the inventory.
        <br><br>
    @else
        <table class="table table-hover" id="table-clickable">
            <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Supplier</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $inventories as $inventory )
                <tr>
                    <td><a href="{{ route('project.show', $project->slug) }}">{{ $project->name }}</a></td>
                    <td>
                        {{ $inventory->name }}
                    </td>
                    <td>
                        {{ $inventory->name }}
                    </td>
                    <td>
                        {{ $inventory->name }}
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>

        {!! $inventories->render() !!}<br>

    @endif
    <a href="{{ route('inventory.create') }}" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>New Inventory Item</a>
@endsection