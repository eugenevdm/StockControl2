@extends('app')

@section('content')

    <h3>Categories</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Categories</li>
    </ol>

    @if ( !$categories->count() )
        There are no categories.
        <br><br>
    @else
        <table class="table table-hover" id="table-clickable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Belongs To</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $categories as $category )
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->belongs_to }}
                    </td>
                    <td width="1%">
                        {!! link_to_route('category.edit', 'Edit', array($category->id), array('class' => 'btn btn-info')) !!}
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories->render() !!}<br>

    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>New Category</a>
@endsection
