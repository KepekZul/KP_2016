<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.dosenHead')
   <script type="text/javascript">
        function ini(){
            document.getElementById("tambah").className="active";
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
                        <form role="form" action="/dosen/isirutin" method="POST">
                            <h4>Hari</h4>
                    <div class="input-group">
                        <select name="hari_angka" class="form-control" onchange="document.getElementById('hari_nama').value=this.options[this.selectedIndex].text">
                                    <option value='1'>Senin</option>
                                    <option value='2'>Selasa</option>
                                    <option value='3'>Rabu</option>
                                    <option value='4'>Kamis</option>
                                    <option value='5'>Jumat</option>
                                    <option value='6'>Sabtu</option>
                                    <option value='7'>Minggu</option>
                                </select>
                            </div>
                            <input type="hidden" name='hari_nama' id='hari_nama' value='Senin'>
                            <h4>Waktu:</h4>
                            <div class="form-group">
                                <input name='jam' type='time' class="form-control">
                            </div>
                            <h4>Kegiatan</h4>
                            <div class="form-group">
                                <textarea name="kegiatan" type='text' class="form-control"></textarea>
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
