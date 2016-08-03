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
                        <form role="form" action="#" method="POST">
                            <h4>Posisi:</h4>
                            <div class="form-group" style="position:relative; height:25px; border:0; padding:0; margin:0;">
                                <select style="position:absolute; top:0px; left:0px; width:82%; height:23px; line-height:20px; margin:0; padding:0;" onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
                                   <option></option>
                                   <option value="one">one</option>
                                   <option value="two">two</option>
                                   <option value="three">three</option>
                                </select>
                                <input name="displayValue" placeholder="" id="displayValue" style="position:absolute; top:0px; left:0px; width:183px; width:80%; #width:80%; height:23px; height:21px\9; #height:18px; border:1px solid #556;" onfocus="this.select()" type="text">
                                <input name="idValue" id="idValue" type="hidden">
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
