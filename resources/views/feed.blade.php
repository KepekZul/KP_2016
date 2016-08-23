<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">
    <script src="{{ URL::asset('js/time.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div id="date_time"></div>
        <h2><strong>(diisi ruang sidang/105) INFORMATION BOARD</strong></h2>

        <div class="isi">
            <h1><marquee direction="left" scrollamount="7">NAMA KEGIATAN<br>WAKTU</marquee></h1>
            <!--<h1><marquee direction="up" scrollamount="3">WAKTU</marquee></h1>-->
        </div>
        
            
        

        <!-- Footer -->

    </div>
    <!-- /.container -->
    <script>
        window.onload = date_time('date_time');
    </script>

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/slider.js') }}"></script>
    
</body>

</html>
