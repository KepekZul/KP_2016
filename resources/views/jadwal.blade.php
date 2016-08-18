<!DOCTYPE html>
<html lang="en">

<head>

   @include('layouts.userHead')

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
        <a href="/pinjam" class="btn btn-primary btn-large">Form Pinjam Ruangan</a>
        <hr>
        <div class="row">
            <div class="col-lg-6">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Pilih Ruang untuk Melihat List Peminjaman</h4>
                    <div class="input-group">
                        <input id="kunci" type="text" class="form-control" list="listdosen" autocomplete="false">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Pilih Tanggal untuk Melihat List Peminjaman</h4>
                    <div class="input-group">
                        <input id="kunci" type="date" class="form-control" list="listdosen" autocomplete="false">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-lg-8">
                <h3>List Peminjaman</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Waktu</th>
                                <th>Nama Kegiatan</th>
                                <th>Ruang</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
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

</body>

</html>
