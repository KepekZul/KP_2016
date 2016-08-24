<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">

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

        <hr>

        <div class="well">
            <div id="ck_slide">
                @foreach($agenda as $isiagenda)
                    <div>
                        <h1 style="text-align:center">{{$isiagenda->isi_agenda}}</h1>
                        <h3 style="text-align:center;">{{$isiagenda->tanggal_mulai_agenda}} sampai dengan {{$isiagenda->tanggal_selesai_agenda}}</h3>
                    </div>
                @endforeach
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
    <script src="{{ URL::asset('js/slider.js') }}"></script>
</body>

</html>
