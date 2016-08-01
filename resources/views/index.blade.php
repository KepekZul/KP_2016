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
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

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
                <a class="navbar-brand" href="index">Home</a>
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
                        <a href="formlogin">LOG IN</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>SI Peminjaman Ruangan dan Informasi Dosen</h1>
            <h2>Jurusan Teknik Informatika ITS</h2><br>
            <p>Menyediakan informasi tentang dosen, agenda jurusan, dan peminjaman ruang sidang dan 105 Jurusan Teknik Informatika ITS.</p>
            <!--<p><a class="btn btn-primary btn-large">Call to action!</a>-->
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

            <div class="col-md-3 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <img src="img/jadwal.png" alt="">
                    <div class="caption">
                        <h3>Agenda Jurusan</h3>
                        <p>
                            <a href="agenda" class="btn btn-primary">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <img src="img/ruangan.png" alt="">
                    <div class="caption">
                        <h3>Pinjam Ruangan</h3>
                        <p>
                            <a href="formpinjam" class="btn btn-primary">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <img src="img/agenda.png" alt="">
                    <div class="caption">
                        <h3>Jadwal Peminjaman Ruangan</h3>
                        <p>
                            <a href="jadwal" class="btn btn-primary">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-8 hero-feature">
                <div class="thumbnail">
                    <img src="img/dosen.png" alt="">
                    <div class="caption">
                        <h3>Lihat Dosen</h3>
                        <p>
                            <a href="lihatdosen" class="btn btn-primary">Lihat</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

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

</body>

</html>
