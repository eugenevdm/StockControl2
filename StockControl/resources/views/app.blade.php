<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start Stock Control</title>

    <!-- Bootstrap minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <style>
        .center-div{
            margin: 0 auto;
            width:80% /* value of your choice which suits your alignment */
        }
    </style>

</head>
<body>

@include('menu')

<div class="container center-div">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class='flash alert-danger'>
            @foreach ( $errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @yield('content')

</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Scripts that cannot be loaded from libraries -->
<script type="text/javascript">

</script>

</body>
</html>