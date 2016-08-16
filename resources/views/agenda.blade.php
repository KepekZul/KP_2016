<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            @include('layouts.userNavbar')
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="well">
            <div id="ck_slide">
                <div>
                    <h2>agenda 1</h2>
                    <h4>ini isi agenda</h4>
                </div>
                <div>
                    <h2>agenda 2</h2>
                    <h4>ini isi agenda</h4>
                </div>
                <div>
                    <h2>agenda 3</h2>
                    <h4>ini isi agenda</h4>
                </div>
                <div>
                    <h2>agenda 4</h2>
                    <h4>ini isi agenda</h4>
                </div>
                <div>
                    <h2>agenda 5</h2>
                    <h4>ini isi agenda</h4>
                </div>
            </div> 
        </div>
        
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/slider.js') }}"></script>
</body>

</html>
