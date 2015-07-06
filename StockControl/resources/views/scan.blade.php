@extends('app')

@section('content')

    <div class="btn-toolbar">
        <a class="btn btn-lg btn-default" href="/scan/">Stock In</a>
    </div>

    <form role="scan" action="receive">

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
            <input name="reason" id="reason" type="text" class="form-control" required placeholder="Enter reason" value="Courier delivery">
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

    {{--
        {!! Form::open(['url' => '/profile', 'method' => 'get']) !!}
        <div id="multiple-datasets">
            {!! Form::text('user', null, ['class'=>'typeahead tt-input']) !!}
            {!! Form::submit('GO') !!}
        </div>
        {!! Form::close() !!}
    --}}

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
                    highlight: true
                },
                {
                    name: 'products-list',
                    minLength: 2,
                    display: 'name',
                    source: the_products,
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