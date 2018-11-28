@extends('manager::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin chung</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Don hang panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Tổng quan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th> Tổng số nhân viên </th>
                                            <th> Tổng số sản phẩm trong cửa hàng </th>
                                            <th> Tổng số đơn hàng của công ty </th>
                                            <th> Tổng số phiếu nhập </th>
                                            <th> Tổng số phiếu chi </th>
                                            <th> Tổng số hàng trong kho </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $company->staffs->count() }}</td>
                                            <td> {{ $company->staffs->count() }} </td>
                                            <td> {{ $company->total_checked_order() }} </td>
                                            <td> {{ $company->imports->count() }} </td>
                                            <td> {{ $company->exports->count() }} </td>
                                            <td> {{ $company->total_product_ready() }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- # Don hang panel -->
        </div>

        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Thông báo
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="/manager/order/" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> Số đơn hàng đang đợi
                            <span class="pull-right text-muted small"><em>{{ \App\Model\Order::where('status', '=', \App\Model\Order::PENDING)->count() }}</em>
                            </span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Sản phẩm trong kho
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th> Sản phẩm </th>
                                        <th> Tổng số sản phẩm còn </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($company->products as $item)
                                            <tr>
                                                <td> {{ $item->name }} </td>
                                                <td> {{ $item->codes->where('is_sold', '=', false)->count() }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> Thông báo
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> Tổng doanh thu
                            <span class="pull-right text-muted small"><em>{{ $company->total_price_orders() }}</em>
                            </span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
@endsection
