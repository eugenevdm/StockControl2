@extends('app')

@section('content')

    <h3>Edit category '{{ $category->name }}'</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/category/">Category</a></li>
        <li class="active">Edit Category</li>
    </ol>

    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['category.update', $category->id]]) !!}
        @include('category/partials/_form', ['submit_text' => 'Save'])
    {!! Form::close() !!}
    
@endsection