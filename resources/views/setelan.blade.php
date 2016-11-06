<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
    <script type="text/javascript">
        function ini(){
            document.getElementById("setelan").className="active";
        }
    </script>
</head>

<body onload="ini()">

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
                        <form name="ruang" method="post" role="form" action="/admin/tambahruang">
                            <h4><strong>Tambah Ruangan</strong></h4>
                            <input name="ruangan" type="text" class="form-control" required><br>
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
                        <form name="interval" method="post" role="form" action="/admin/tambahinterval">
                            <h4><strong>Tambah Interval Peminjaman</strong></h4>
                            <hr>
                            <table style="width:100%">
                                <tr>
                                    <th>
                                        <h4>Interval Hari</h4>
                                    </th>
                                    <th>
                                        <h4>Keterangan</h4>
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
                    <div class="well">
                        <form name="password" method="post" role="form" action="/admin/gantipassword" onsubmit="return ceksama()">
                            <h4><strong>Ganti Password</strong></h4>
                            <hr>
                            <h4>Password Lama</h4>
                            <input name="passwordlama" type="password" class="form-control" required><br>
                            <h4>Password Baru</h4>
                            <input name="passwordbaru1" type="password" class="form-control" required><br>
                            <h4>Password Baru (Ketikkan Sekali Lagi)</h4>
                            <input name="passwordbaru2" type="password" class="form-control" required><br>
                            <button type="submit" class="btn btn-primary">Ganti</button>
                        </form>
                        <script type="text/javascript">
                            function ceksama(){
                                if(document.forms["password"]["passwordbaru1"].value==document.forms["password"]["passwordbaru2"].value){
                                    return true;
                                }else{
                                    alert('Password yang dimasukkan berbeda.')
                                    return false;
                                }
                                alert('huehuehue');
                            }
                        </script>
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
