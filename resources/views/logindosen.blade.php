<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.loginHead')
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
    <!--<div class="container center_div">-->
    <div class="container center_div">
        <div class="row text-center">
        <form action="login/admin" method="post">
            <div class="col-xs-3 col-centered" style="float:relative">
                <div class="thumbnail">
                    <img style="width:200px;height:200px" src="img/user.png" alt="">
                    <div class="caption">
                        <h3>LOGIN</h3>
                        <input type="text" name="id" id="id" class="form-control" placeholder="ID" required autofocus>
                        <br>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
                        <!-- <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div> -->
                        <p>
                            <input type="submit" class="btn btn-primary" value="Login"></input>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        </div>
        <!-- /c

        <hr>

        <!-- Footer -->
        
    </div>
    <div class="container center_div">
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

</body>

</html>
