<!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin - Tables</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap 5 JS Bundle (bao gồm cả Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
        @yield('css')
        <style>
        .highlightRow {
                background-color: #dadada;
            }
        img{
            cursor: pointer;
        }
        #btnadd {
            float: right;
            height: 38px;
            border-radius: 7px;
            color: white;
        }
        select .option {
            width: 250px;
        }

        .option {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        </style>
        @show


    </head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">ADMIN Table</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
                {{ Auth::guard('admin')->user()->username}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin</span>
            </a>
        </li>
        @section('danhmuc')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminsqldanhmuc') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý danh mục</span></a>
        </li>
        @show
        <!-- @section('loaisach')

        @show -->
        @section('sach')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminsqlsach')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý sách</span></a>
        </li>
        @show
        @section('chitietsach')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminsqlchitietsach') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý chi tiết sách</span></a>
        </li>
        @show
        @section('donhang')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminsqldondathang') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn đặt hàng</span></a>
        </li>
        @show
        @section('khachhang')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('adminsqlkhachhang') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý khách hàng</span></a>
        </li>
        @show
        </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

        <!-- Breadcrumbs-->
            @yield('tenbang')
            @yield('table')
            <p class="small text-center text-muted my-5">
            </p>
        </div>
        @yield('model')

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2018</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="javascript:void(0)" onClick="document.getElementById('logout-form').submit()">Logout</a>
                <form class='d-none' id="logout-form" action="/admin/logout" method="POST">
                    @csrf
                </form>
            </div>
            </div>
        </div>
    </div>
    @section('javascript')
    @show
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('/js/demo/datatables-demo.js') }}"></script>

    @stack('js')
  </body>
</html>
