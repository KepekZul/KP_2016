<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
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
                    <img src="../img/jadwal.png" alt="">
                    <div class="caption">
                        <h3>Agenda Jurusan</h3>
                        <p>
                            <a href="/agenda" class="btn btn-primary">Lihat</a>
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
                            <a href="/pinjam" class="btn btn-primary">Lihat</a>
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
                            <a href="/reservasi" class="btn btn-primary">Lihat</a>
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
        @include('layouts.footer')
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
