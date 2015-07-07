@extends('app')

@section('content')

    <h3>Edit item '{{ $inventory->name }}'</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/inventory/">Inventory</a></li>
        <li class="active">Edit Inventory Item</li>
    </ol>

    {!! Form::model($inventory, ['method' => 'PATCH', 'route' => ['inventory.update', $inventory->id]]) !!}
        @include('inventory/partials/_form', ['submit_text' => 'Save'])
    {!! Form::close() !!}
    
@endsection