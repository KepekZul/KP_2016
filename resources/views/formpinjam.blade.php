<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
    <script type="text/javascript">
    function validasi(){
        var Tanggal = document.forms["formpinjam"]["tglmulai"].value;
        var date = new Date();
        var tahun = date.getFullYear();
        var bulan = date.getMonth()+1;
        if(bulan<10) bulan='0'+bulan;
        var hari = date.getDate();
        if(hari<10)hari='0'+hari;
        date = tahun+'-'+bulan+'-'+hari;
        if(Tanggal<date){
            alert("Tanggal yang anda pilih telah lewat.")
            return false;
        }
        return true;
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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Peminjaman Ruangan</h1>
            </div>
        </div>
        <span id="valid"></span>
        @if(Session::has('msg'))
            <span style="background-color:red; color:white;">
                {{Session::get('msg')}}
            </span>
        @endif
        <div class="well">
            <form role="form" onsubmit="return validasi()" name="formpinjam" action="isiPinjam" method="POST">
                <h4>Nama Lengkap:</h4>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" autocomplete="false" required>
                </div>
                <h4>No. Telepon:</h4>
                <div class="form-group">
                    <input type="text" name="telp" class="form-control" required>
                </div>
                <h4>Email:</h4>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required>
                </div>
                <h4>Nama Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="keg" class="form-control" autocomplete="false" required>
                </div>
                <h4>Tanggal Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="date" name="tglmulai" class="form-control" required>
                </div>
                <h4>Waktu Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktmulai" class="form-control" required>
                </div>
                <h4>Waktu Selesai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktselesai" class="form-control" required>
                </div>
                <h4>Badan Pelaksana Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="badan" class="form-control" autocomplete="false" required>
                </div>
                <h4>Ruang yang Ingin Dipinjam:</h4>
                <div class="form-group">
                    <select name="ruang" class="form-control">
                        @foreach($ruangan as $ruang)
                        <option value="{{$ruang->nama_ruangan}}">{{$ruang->nama_ruangan}}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Rutinitas:</h4>
                <div class="form-group">
                    <select name="rutin" class="form-control">
                        @foreach($rutinitas as $rutin)
                        <option value="{{$rutin->frekwensi_rutinitas}}">{{$rutin->keterangan_rutinitas}}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Kali Peminjaman:</h4>
                <div class="form-group">
                    <input type="text" name="kali" class="form-control" required>
                </div>
            <button type="submit" name="pinjam" class="btn btn-primary">Pinjam</button>
            </form>
        </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <script type="text/javascript">
    </script>
    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
