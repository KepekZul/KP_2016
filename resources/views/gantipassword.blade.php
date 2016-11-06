<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.dosenHead')
   <script type="text/javascript">
        function ini(){
            document.getElementById("password").className="active";
        }
    </script>
</head>

<body onload="ini()">

    <div id="wrapper">
        @include('layouts.dosenNavbar')
        <div id="page-wrapper">

            <div class="container-fluid" style="height:100%">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Ganti Password</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="well">
                        <form role="form" action="post" method="POST">
                            <h4>Password Lama</h4>
                            <div class="form-group">
                                <input name='passlama' type='password' class="form-control" list='listid' autocomplete="off">
                            </div>
                            <h4>Password Baru</h4>
                            <div class="form-group">
                                <input name='passbaru1' type='password' class="form-control" list='listid' autocomplete="off">
                            </div>
                            <h4>Password Baru (Ketikkan Sekali Lagi)</h4>
                            <div class="form-group">
                                <input name='passbaru2' type='password' class="form-control" list='listid' autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
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
