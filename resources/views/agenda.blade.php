<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
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
