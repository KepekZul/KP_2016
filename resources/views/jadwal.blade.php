<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   @include('layouts.userHead')
   <script type="text/javascript">
   function filterRuang(){
    var i;
    var KeyRuangan = document.getElementById("ruang");
    var table = document.getElementById("tableJadwal");
    var tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
    var td = tr[i].getElementsByTagName("td")[4];
     if (td) {
       if (td.innerHTML.indexOf(KeyRuangan.options[KeyRuangan.selectedIndex].text) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
       }
    }
}
}
   </script>

   <script type="text/javascript">
    $(document).ready(function() {
        $('#tableJadwal').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );
   </script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            @include('layouts.userNavbar')
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <a href="/pinjam" class="btn btn-primary btn-large">Form Pinjam Ruangan</a>
        <hr>
        <div class="row">
            <div class="col-lg-6">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Ruang</h4>
                    <div class="input-group" style="width:80%;" onchange="filterRuang();">
                        <select name="ruangan" id="ruang" type="text" class="form-control" style="min-width:250px; width:100%;" autocomplete="false">
                            @foreach($ruangan as $ruang)
                            <option>{{$ruang->nama_ruangan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>List Peminjaman</h3>
                <div class="table-responsive">
                    <table id="tableJadwal" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Ruang</th>
                            </tr>
                        </thead>
                        <tbody id="daftar">
                            @foreach($peminjaman as $daftarPinjam)
                            <tr>
                                <td>{{$daftarPinjam->nama_kegiatan}}</td>
                                <td>{{$daftarPinjam->tanggal_kegiatan}}</td>
                                <td>{{$daftarPinjam->waktu_mulai_kegiatan}}</td>
                                <td>{{$daftarPinjam->waktu_selesai_kegiatan}}</td>
                                <td>{{$daftarPinjam->nama_ruangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
        <hr>
        <!-- Footer -->
        @include('layouts.footer')


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
