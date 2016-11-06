<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   @include('layouts.userHead')
   <script type="text/javascript">
   function cekRuang(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(xhttp.readyState==4 && xhttp.status==200){
                $all = JSON.parse(xhttp.responseText);
                var cont = Object.keys($all["kegiatan"]).length;
                if(cont>0){
                    $isiHtml="";
                    for(i=0; i<cont; i++){
                        $mulai=$all["kegiatan"][i]["waktu_mulai"];
                        $selesai=$all["kegiatan"][i]["waktu_selesai"];
                        $kegiatan=$all["kegiatan"][i]["nama_kegiatan"];
                        $isiHtml=$isiHtml+"<tr><td>"+$mulai+" sampai "+$selesai+"</td><td>"+$kegiatan+"</tr>";
                    }
                    document.getElementById("daftar").innerHTML=$isiHtml;
                }else{
                    document.getElementById("daftar").innerHTML="<tr><td>kosong</td><td>kosong</td></tr>";
                }
            }
        };
        xhttp.open("get", "/reservasi/"+document.getElementById("ruang").value+"/"+document.getElementById("tanggal").value, true);
        xhttp.send();
    }
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
                    <h4>Pilih Ruang untuk Melihat List Peminjaman</h4>
                    <div class="input-group" style="width:80%;" onchange="cekRuang()">
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
            <div class="col-lg-6">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Pilih Tanggal untuk Melihat List Peminjaman</h4>
                    <div class="input-group" style="width:80%;" onchange="cekRuang()">
                        <input name="tanggal" id="tanggal" type="date" class="form-control" style="min-width:250px; width:100%;" autocomplete="false">
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-lg-12">
                <h3>List Peminjaman</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Nama Kegiatan</th>
                                <th>Ruang</th>
                                <th>Badan Pelaksana Kegiatan</th>
                                <th>Rutinitas Kegiatan</th>
                                <th>Kali Peminjaman</th>
                                <th>Peminjam</th>
                                <th>No. Telepon Peminjam</th>
                                <th>Email Peminjam</th>
                            </tr>
                        </thead>
                        <tbody id="daftar">
                            <tr>
                                <td>kosong</td>
                                <td>kosong</td>
                            </tr>
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
