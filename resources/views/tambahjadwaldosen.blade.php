<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.dosenHead')
   <script type="text/javascript">
        function ini(){
            document.getElementById("status").className="active";
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
                        <h1 class="page-header">Tambah Jadwal Rutin Dosen</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="well">
                        <form role="form" action="post" method="POST">
                            <h4>Tanggal:</h4>
                            <div class="form-group">
                                <input name='status_baru' type='date' class="form-control">
                            </div>
                            <h4>Waktu:</h4>
                            <div class="form-group">
                                <input name='status_baru' type='time' class="form-control">
                            </div>
                            <h4>Kegiatan</h4>
                            <div class="form-group">
                                <textarea name="isi" type='text' class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
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
