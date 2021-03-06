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
            <div class="col-lg-12">
                <ul class="list-group" id="kotakDosen"></ul>

                <div class="row">
                    <div class="col-lg-12">
                        <h3>Jadwal Rutin Dosen</h3>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody id="daftar">
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

            var xhttp2 = new XMLHttpRequest();
            xhttp2.onreadystatechange=function(){
                if(xhttp2.readyState==4 && xhttp2.status==200){
                    $all2 = JSON.parse(xhttp2.responseText);
                    $isiHTML2="";
                    var cont2 = Object.keys($all2["rutindosen"]).length;
                    console.log(cont2);
                    for(j=0; j<cont2; j++){
                        $data2 = $all2["rutindosen"][j];
                        $Hari=$data2['hari_rutin'];
                        $Waktu=$data2['waktu_rutin'];
                        $kegiatan=$data2['kegiatan_rutin'];
                        $isiHTML2=$isiHTML2+"<tr><td>"+$Hari+"</td><td>"+$Waktu+"</td><td>"+$kegiatan+"</td></tr>";
                    }
                    console.log($isiHTML2);
                    document.getElementById("daftar").innerHTML=$isiHTML2;
                }
            };
            xhttp2.open("get", "/lihatdosen/rutin/"+document.getElementById("kunci").value, true);
            xhttp2.send();
        };
        </script>
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
