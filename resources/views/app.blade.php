<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ isset($title) ? $title : 'Chat' }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Chat</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Rooms list</a></li>
                {{--<li><a href="#contact">Contact</a></li>--}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                <li>{!! link_to('/auth/logout','Logout') !!}</li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">

    <div class="text-center">
        <h1>{{ isset($title) ? $title : 'Chat' }}</h1>
    </div>

    @yield('body')

</div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('/assets/js/jquery-1.11.1.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
    var _globalObj = {!! json_encode(array('_token'=> csrf_token())) !!};
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': _globalObj._token }
    });
    window.user = {!! Auth::user()->toJson() !!};
</script>
@yield('javascript')
</body>
</html>