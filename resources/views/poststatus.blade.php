<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.dosenHead')
</head>

<body>

    <div id="wrapper">
        @include('layouts.dosenNavbar')
        <div id="page-wrapper">

            <div class="container-fluid" style="height:100%">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post Status Dosen</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="well">
                        <form role="form" action="post" method="POST">
                            <h4>Posisi:</h4>
                            <div class="form-group">
                                <input name='status_baru' type='text' class="form-control" list='listid' autocomplete="off">
                                <datalist id='listid'>
                                   @foreach($status as $stat)
                                   <option label='{{$stat->status_dosen}}' value='{{$stat->status_dosen}}'></option>
                                   @endforeach
                                </datalist>
                            </div>
                            <h4>Pengumuman:</h4>
                            <div class="form-group">
                                <textarea rows="5" name="isi" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Posting</button>
                        </form>
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
