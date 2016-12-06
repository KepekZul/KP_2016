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
                        <h1 class="page-header">Edit Jadwal Rutin Dosen</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="well">
                        <form role="form" action="/dosen/editrutin" method="POST">
                            <h4>Hari</h4>
                            <div class="form-group" selected="{{$hasil[0]->hari_rutin}}">
                                <select name='hari' class="form-control">
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                                <option>Minggu</option>
                            </select>
                            </div>
                            <h4>Waktu:</h4>
                            <input name="id" value="{{$hasil[0]->id_rutin}}" type="hidden">
                            <div class="form-group">
                                <input name='waktu' type='jam' class="form-control" value="{{$hasil[0]->waktu_rutin}}">
                            </div>
                            <h4>Kegiatan</h4>
                            <div class="form-group">
                                <textarea name="kegiatan" type='text' class="form-control">{{$hasil[0]->kegiatan_rutin}}</textarea>
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
