<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
    <script type="text/javascript">
        function ini(){
            document.getElementById("agenda").className="active";
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
                        <h1 class="page-header">Post Agenda Jurusan</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="well">
                        <form role="form" action="isiAgenda" method="POST">
                            <h4>Tanggal Mulai:</h4>
                            <div class="form-group">
                                <input type="date" name="mulai" class="form-control">
                            </div>
                            <h4>Tanggal Selesai:</h4>
                            <div class="form-group">
                                <input type="date" name="selesai" class="form-control">
                            </div>
                            <h4>Isi Agenda:</h4>
                            <div class="form-group">
                                <textarea rows="5" name="isi" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Posting</button>
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
