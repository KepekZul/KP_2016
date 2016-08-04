<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap1.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/heroic-features.css') }}" rel="stylesheet">

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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="agenda">Agenda Jurusan</a>
                    </li>
                    <li>
                        <a href="jadwal">Pinjam Ruangan</a>
                    </li>
                    <li>
                        <a href="lihatdosen">Lihat Dosen</a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/login/admin">ADMIN</a>
                    </li>
                    <li>
                        <a href="/login/dosen">DOSEN</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <!--<div class="container center_div">-->
    <div class="container center_div">
        <div class="row text-center">
        <form action="loga" method="post">
            <div class="col-xs-3 col-centered" style="float:relative">
                <div class="thumbnail">
                    <img style="width:200px;height:200px" src="../img/user.png" alt="">
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
        @if(Session::has('msg'))
            <span style="background-color:red; color:white;">
                {{Session::get('msg')}}
            </span>
        @endif
        </div>
        
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
