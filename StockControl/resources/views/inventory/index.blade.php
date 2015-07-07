@extends('app')

@section('content')

    <h3>Inventory</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Inventory</li>
    </ol>

    @if ( !$inventories->count() )
        There is nothing in the inventory. Move some stock first.
        <br><br>
    @else
        <table class="table table-hover" id="table-clickable">
            <thead>
            <tr>
                <th>SKU</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $inventories as $inventory )
                <tr>
                    <td>
                        {{ $inventory->sku()->find(1)->code }}
                    </td>
                    <td>
                        {{ $inventory->category()->find(1)->name }}
                    </td>
                    <td>
                        {{ $inventory->name }}
                    </td>
                    <td>
                        {{ $inventory->description }}
                    </td>
                    <td>
                        {{ $inventory->stocks()->find(1)->quantity }}
                    </td>
                    <td>
                        {{ $inventory->price }}
                    </td>
                    <td>
                        @if ($inventory->suppliers())
                        {{ $inventory->suppliers()->find(1)->name }}
                        @endif

                    </td>
                    <td>
                        {{ $inventory->url }}
                    </td>
                    <td width="1%">
                        {!! link_to_route('inventory.edit', 'Edit', array($inventory->id), array('class' => 'btn btn-info')) !!}
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
