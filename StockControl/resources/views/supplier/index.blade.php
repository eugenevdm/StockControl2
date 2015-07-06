@extends('app')

@section('content')

    <h3>Suppliers</h3>

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Suppliers</li>
    </ol>

    @if ( !$suppliers->count() )
        There are no suppliers.
        <br><br>
    @else
        <table class="table table-hover" id="table-clickable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Phone</th>
                <th>Fax</th>
                <th>Email</th>
                <th>City</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $suppliers as $supplier )
                <tr>
                    <td>
                        {{ $supplier->name }}
                    </td>
                    <td>
                        {{ $supplier->contact_name }}
                    </td>
                    <td>
                        {{ $supplier->contact_phone }}
                    </td>
                    <td>
                        {{ $supplier->contact_fax }}
                    </td>
                    <td>
                        {{ $supplier->contact_email }}
                    </td>
                    <td>
                        {{ $supplier->city }}
                    </td>
                    <td>
                        {{ $supplier->url }}
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>

        {!! $suppliers->render() !!}<br>

    @endif
    <a href="{{ route('supplier.create') }}" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>New Supplier</a>
@endsection
