<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            @include('layouts.adminNavbar')
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="height:100%">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Setelan</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="well">
                        <form method="post" role="form" action="/admin/tambahruang">
                            <h4>Tambah Ruangan</h4>
                            <input name="ruangan" type="text" class="form-control" style="width:70%;" required><br>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                        @if(Session::has('ruang_ok'))
                        <span style="background-color:rgb(0,255,0);">{{Session::get('ruang_ok')}}</span>
                        @endif
                        @if(Session::has('ruang_ko'))
                        <span style="background-color:rgb(255,0,0); color:white;">{{Session::get('ruang_ko')}}</span>
                        @endif
                    </div>
                    <br>
                    <div class="well">
                        <form method="post" role="form" action="/admin/tambahinterval">
                            <h4>Tambah Interval Peminjaman</h4>
                            <table style="width:70%">
                                <tr>
                                    <th>
                                        Interval Hari
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <input name="interval" type="number" class="form-control" required><br>
                                    </th>
                                    <th>
                                        <input name="keterangan" type="text" class="form-control" required><br>
                                    </th>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                        @if(Session::has('interval_ok'))
                        <span style="background-color:rgb(0,255,0);">{{Session::get('interval_ok')}}</span>
                        @endif
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
