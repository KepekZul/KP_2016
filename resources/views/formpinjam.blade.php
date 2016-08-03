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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Pinjam Ruangan</h1>
            </div>
        </div>
        <div class="well">
            <form role="form" action="#" method="POST">
                <h4>Nama:</h4>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control">
                </div>
                <h4>No. Telepon:</h4>
                <div class="form-group">
                    <input type="text" name="telp" class="form-control">
                </div>
                <h4>Email:</h4>
                <div class="form-group">
                    <input type="email" name="email" class="form-control">
                </div>
                <h4>Nama Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="keg" class="form-control">
                </div>
                <h4>Tanggal Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="date" name="tglmulai" class="form-control">
                </div>
                <h4>Waktu Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktmulai" class="form-control">
                </div>
                <h4>Waktu Selesai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktselesai" class="form-control">
                </div>
                <h4>Badan Pelaksana Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="badan" class="form-control">
                </div>
                <h4>Ruang yang Ingin Dipinjam:</h4>
                <div class="form-group">
                    <select name="ruang" class="form-control">
                        <option>Ruang 105</option>
                        <option>Ruang Sidang</option>
                    </select>
                </div>
                <h4>Rutinitas:</h4>
                <div class="form-group">
                    <select name="rutin" class="form-control">
                        <option>Harian</option>
                        <option>Bulanan</option>
                        <option>Tahunan</option>
                    </select>
                </div>
                <h4>Kali Peminjaman:</h4>
                <div class="form-group">
                    <input type="text" name="kali" class="form-control">
                </div>
                <button type="submit" name="pinjam" class="btn btn-primary">Pinjam</button>
            </form>
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
