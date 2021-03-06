<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
    <script type="text/javascript">
        function ini(){
            document.getElementById("acc").className="active";
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
                                        <td><button name="kode_permohonan" value="{{$list->kode_permohonan}}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Modal--{{$list->kode_permohonan}}">Lihat</button></td>
                                        <td><form method="post" action="acc"><button name="kode_permohonan" value="{{$list->kode_permohonan}}" class="btn btn-sm btn-success">Setujui</button></form></td>
                                        <td><form method="post" action="tolak"><button name="kode_permohonan" value="{{$list->kode_permohonan}}" class="btn btn-sm btn-danger">Tolak</button></form></td>
                                    </tr>
                                        <div class="modal fade" id="Modal--{{$list->kode_permohonan}}" role="dialog">
                                            <div class="modal-dialog">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <li>Atas nama: {{$list->nama_pemohon_peminjaman}}</li>
                                                  <li>Kode permohonan: {{$list->kode_permohonan}}</li>
                                                  <li>Nama kegiatan: {{$list->nama_kegiatan}}</li>
                                                  <li>Tanggal mulai: {{$list->tanggal_mulai_permohonan_peminjaman}}</li>
                                                  <li>Waktu mulai: {{$list->waktu_mulai_permohonan_peminjaman}}</li>
                                                  <li>Waktu selesai: {{$list->waktu_selesai_permohonan_peminjaman}}</li>
                                                  <li>Badan pelaksana: {{$list->badan_pelaksana_kegiatan}}</li>
                                                  <li>Tiap {{$list->rutinitas_peminjaman}} hari</li>
                                                  <li>Sebanyak {{$list->kali_peminjaman}} kali pinjam</li>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                    @endforeach
                                </tbody>
                            </table>
                            @if(Session::has('msg'))
                                <span style="background-color:red; color:white;">
                                    {{Session::get('msg')}}
                                </span>
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
