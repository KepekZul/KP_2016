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
                        <h1 class="page-header">Beranda</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <!--<i class="fa fa-comments fa-5x"></i>-->
                                        <img style="height:80px" src="../img/post.png" alt="">
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Post Agenda Jurusan</h3></div>
                                    </div>
                                </div>
                            </div>
                            <a href="agenda">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <!--<i class="fa fa-tasks fa-5x"></i>-->
                                        <img style="height:80px" src="../img/acc.png" alt="">
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Menyetujui Peminjaman Ruangan</h3></div>
                                    </div>
                                </div>
                            </div>
                            <a href="accruangan">
                                <div class="panel-footer">
                                    <span class="pull-left">Lihat</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
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
