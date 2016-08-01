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
                        <h1 class="page-header">Permintaan Pinjam Ruangan</h1>
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
                                        <th>Nama Peminjam</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tanggal Mulai Kegiatan</th>
                                        <th>Ruang yang Dipinjam</th>
                                        <th>Detail</th>
                                        <th>Setujui</th>
                                        <th>Tolak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listPermohonan as $list)
                                    <tr>
                                        <td>{{$list->nama_pemohon_peminjaman}}</td>
                                        <td>{{$list->nama_kegiatan}}</td>
                                        <td>{{$list->tanggal_mulai_permohonan_peminjaman}}</td>
                                        <td>{{$list->nama_ruangan}}</td>
                                        <td><a href="lihat"><button method="post" name="lihat" action="admin/lihat" value="{{$list->kode_permohonan}}" class="btn btn-sm btn-primary">Lihat</button></a></td>
                                        <td><button class="btn btn-sm btn-success">Setujui</a></td>
                                        <td><button class="btn btn-sm btn-danger">Tolak</a></td>
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
