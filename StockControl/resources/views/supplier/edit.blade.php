@extends('app')

@section('content')

    <h3>Edit supplier '{{ $supplier->name }}'</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/supplier/">Supplier</a></li>
        <li class="active">Edit Supplier</li>
    </ol>

    {!! Form::model($supplier, ['method' => 'PATCH', 'route' => ['supplier.update', $supplier->id]]) !!}
        @include('supplier/partials/_form', ['submit_text' => 'Save'])
    {!! Form::close() !!}
    
@endsection