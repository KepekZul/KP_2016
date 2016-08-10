<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.userHead')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
             <div class="col-lg-8">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Masukkan Nama atau NIDN Dosen</h4>
                    <div class="input-group">
                        <input id="kunci" type="text" class="form-control" list="listdosen" autocomplete="false">
                        <datalist id='listdosen'>
                            @foreach($listDosen as $dosen)
                            <option>{{$dosen->nama_dosen}}</option>
                            @endforeach
                        </datalist>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" onclick="getList();">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-8">
                <ul class="list-group" id="kotakDosen">
                </ul>
            </div>
        </div>
<script type="text/javascript">
function getList(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(xhttp.readyState==4 && xhttp.status==200){
            $all = JSON.parse(xhttp.responseText);
            $isiHTML="";
            var cont = Object.keys($all["dataDosen"]).length;
            console.log(cont);
            for(i=0; i<cont; i++){
                $data = $all["dataDosen"][i];
                $nama = $data["nama_dosen"];
                $nidn = $data["NIDN_dosen"];
                $posisi = $data["status_terkini"];
                $pengumuman = $data["pengumuman_terkini"];
                $isiHTML=$isiHTML+"<li class='list-group-item'>Dosen: "+$nama+"<br>"+"NIDN: "+$nidn+"<br>"+"Posisi: "+$posisi+"<br>"+"Pengumuman: "+$pengumuman+"<br>";
            }
            console.log($isiHTML);
            document.getElementById("kotakDosen").innerHTML=$isiHTML;
        }
    };
    xhttp.open("get", "/lihatdosen/data/"+document.getElementById("kunci").value, true);
    xhttp.send();
};
</script>
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

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
