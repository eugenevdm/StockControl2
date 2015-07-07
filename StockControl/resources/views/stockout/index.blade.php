@extends('app')

@section('content')

    <h3>Stock Out</h3>

    <form role="scan" action="remove">

        <div class="form-group" id="multiple-datasets">
            <input name="name" id="name" required type="text" class="typeahead tt-input form-control"
                   placeholder="Scan the label">
        </div>

        <div class="form-group" id="multiple-datasets">
            <input name="sku" id="sku" type="text" class="form-control" placeholder="SKU">
        </div>

        <div class="form-group">
            <input name="price" id="price" type="text" class="form-control" placeholder="Price">
        </div>

        <div class="form-group">
            <input name="quantity" id="quantity" type="text" class="form-control" placeholder="Quantity in stock">
        </div>

        <div class="form-group">
            <input name="new_quantity" id="new_quantity" type="number" required type="text" class="form-control" placeholder="Quantity received">
        </div>

        <div class="form-group">
            <input name="reason" id="reason" type="text" class="form-control" required placeholder="Enter reason">
        </div>

        <div class="form-group">
            {!! Form::label('location', 'Location') !!}
            {!! Form::select(
            'location_id',
            $locations,
            null,
            ['class' => 'form-control']
            ) !!}
        </div>

        <button type="submit" class="btn btn-default">Continue</button>
    </form>

    <hr>

    <h3>Last 5 movements</h3>

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

    <link rel="stylesheet" href="/css/search.css">

    <!-- Load Jquery and Typeahead first -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- Script to put the focus on the scan label field -->
    <script>
        $(function () {
            $("#name").focus();
        });
    </script>

    <script>

        var the_products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/api?sku=%QUERY',
                wildcard: '%QUERY'
            }
        });

        $('#multiple-datasets .typeahead').typeahead({
                    autoselect : true,
                    highlight: true
                },
                {
                    name: 'products-list',
                    source: the_products,
                    minLength: 2,
                    display: 'name',
                    templates: {
                        empty: ['<h4 class="item-type-name">Products</h4><h6 class="empty-message">No products</h6>'],
                        header: '<h4 class="item-type-name">Products</h4>'
                    }
                }
        );

        $('input[name=name]').on('typeahead:selected', function (evt, item) {
            $('#sku').val(item.code);
            $('#price').val(item.price);
            $('#quantity').val(item.quantity);
            $("#new_quantity").focus();
        });

    </script>

@endsection