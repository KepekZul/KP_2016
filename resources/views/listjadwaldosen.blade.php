<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.dosenHead')
   <script type="text/javascript">
        function ini(){
            document.getElementById("edit").className="active";
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
                        <h1 class="page-header">Edit Jadwal Rutin Dosen</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Kegiatan</th>
                                        <th>Sunting</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($hasil as $isi)
                                    <tr>
                                        <td>{{$isi->hari_rutin}}</td>
                                        <td>{{$isi->waktu_rutin}}</td>
                                        <td>{{$isi->kegiatan_rutin}}</td>
                                        <td><a href="/dosen/editjadwaldosen/{{$isi->hari_rutin}}/{{$isi->waktu_rutin}}"><button type="button" class="btn btn-sm btn-info">Sunting</button></a></td>
                                        <td><a href=""><button type="button" class="btn btn-sm btn-danger">Hapus</button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
