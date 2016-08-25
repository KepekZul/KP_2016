<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">
    <script src="{{ URL::asset('js/time.js')}}"></script>
    <link rel="icon" href="../img/if.png">
</head>

<body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div id="date_time"></div>
        <h2><strong id="ruang">{{$ruang}}</strong></h2>
        @if(count($now)>0)
        <div id="kotakbesar" class="isi" style="background-color:rgb(255,0,0);">
        @else
        <div id="kotakbesar" class="isi" style="background-color:rgb(0,255,0);">
        @endif
            <h1><marquee id="kegSekarang" direction="up" height="120%" scrollamount="3">
                @if(count($now)<1)
                Tidak ada kegiatan
                @else
                {{$now[0]->nama_kegiatan}}
                @endif
                </marquee>
            </h1>
            <br>
            <h1 id="wktSekarang" style="text-align:center; color:white;">
                @if(count($now)<1)
                --:--:--
                @else
                {{$now[0]->waktu_mulai_permohonan_peminjaman}} - 
                {{$now[0]->waktu_selesai_permohonan_peminjaman}}
                @endif
            </h1>
        </div>
        
            
        

        <!-- Footer -->

    </div>
    <!-- /.container -->
    <script>
        window.onload = date_time('date_time');
        window.onload = function(){
                        setInterval(function(){
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange=function(){
                                if(xhttp.readyState==4 && xhttp.status==200){
                                    $all = JSON.parse(xhttp.responseText);
                                    $now = $all['now'][0];
                                    $next = $all['next'][0];
                                    console.log($now);
                                    if($now){
                                        document.getElementById("kegSekarang").innerHTML=$now['nama_kegiatan'];
                                        document.getElementById("wktSekarang").innerHTML=$now['waktu_mulai_permohonan_peminjaman']+" - "+$now['waktu_selesai_permohonan_peminjaman'];
                                        document.getElementById("kotakbesar").style.backgroundColor="rgb(255,0,0)";
                                        console.log("ada");
                                    }else{
                                        document.getElementById("kegSekarang").innerHTML="Tidak ada kegiatan";
                                        document.getElementById("wktSekarang").innerHTML="--:--:--";
                                        document.getElementById("kotakbesar").style.backgroundColor="rgb(0,255,0)";
                                        console.log("gak ada");
                                    }
                                }
                            };
                            xhttp.open("get", "/feeder/"+document.getElementById("ruang").innerHTML, true);
                            xhttp.send();
                        }, 3000)}
    </script>

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/slider.js') }}"></script>
    
</body>

</html>
