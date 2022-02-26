<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('layout.head')
    <title>Cafe kasir</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layout.top')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layout.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Laporan</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
                <form action="{{url('carimanager')}}" method="get">
                        @csrf
                        <div class="form-group row">
                            <label for="from" class="col-form-label col-sm-2">Date From:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" id="from" name="from"  required>
                            </div>
                            <label for="to" class="col-form-label col-sm-2">Date to:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" id="to" name="to" required>
                            </div>
                            <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary mb-1"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>
            @endif
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                        </tr>
                        @foreach($data as $u)
                        <tr>
                        <td>{{$u->nama_pelanggan}}</td>
                        <td>{{$u->nama_menu}}</td>
                        <td>{{$u->jumlah}}</td>
                        <td>{{$u->total_harga}}</td>
                        <td>{{$u->nama_pegawai}}</td>
                        <td>
                            {{$u->tanggal}}
                            <!-- <a href="createkasir" class="btn btn-warning">Pesan</a> -->
                        </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layout.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @include('layout.script')
</body>

</html>