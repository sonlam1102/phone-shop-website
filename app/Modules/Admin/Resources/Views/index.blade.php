<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="../css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="../css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body>
    @include('layouts.update_info')
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.blade.php">SB Admin v2.0</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                @if (!\Auth::check())
                    <button class="btn btn-default btn-xs dropdown-toggle">Login </button>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ \Auth::user()->userinfo ?  \Auth::user()->userinfo->fullname : \Auth::user()->name }}
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu dropdown-user">

                            <li>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#userinfo_modal" id="update"><strong>Cập nhật thông tin </strong></a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form-admin').submit();"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất </a>
                                <form id="logout-form-admin" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                @endif
            </ul>

            <!-- Cot index -->
            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>

                        <li>
                            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Thông tin chung </a>
                        </li>

                        <li>
                            <a href="/admin/category"><i class="fa fa-dashboard fa-fw"></i> Thể loại  </a>
                        </li>

                        <li>
                            <a href="/admin/city"><i class="fa fa-dashboard fa-fw"></i> Tỉnh / Thành phố  </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw"></i> Sản phẩm <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/admin/attribute">Thuộc tính </a>
                                </li>

                                <li>
                                    <a href="buttons.html">Nhãn hiêu  </a>
                                </li>

                                <li>
                                    <a href="notifications.html">Sản phẩm hiện có </a>
                                </li>

                                <li>
                                    <a href="typography.html">Bảo hành </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-sitemap fa-fw"></i> Đơn hàng <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="../js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../js/plugins/morris/morris.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="../js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="../js/demo/dashboard-demo.js"></script>
    <script>
        $("#avatar-2").fileinput({
            overwriteInitial: true,
            display: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            elErrorContainer: '#kv-avatar-errors-2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="{{ $data ? $data->img : "/img/avatar.jpg" }}" alt="Your Avatar">',
            layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
        });
    </script>
</body>

</html>