@extends('admin::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin chung</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Don hang panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin tổng quát
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Số người quản lý</th>
                                        <th>Số cửa hàng </th>
                                        <th>Số loại sản phẩm </th>
                                        <th>Số nhãn hiệu </th>
                                        <th>Số thuộc tính SP </th>
                                        <th>Tổng số nhân viên </th>
                                        <th>Tổng sản phẩm </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ \Auth::user()->where('type', '=', \App\User::TYPE_MANAGER)->count() }}</td>
                                        <td>{{ \App\Model\Company::all()->count() }}</td>
                                        <td>{{ \App\Model\Category::all()->count() }}</td>
                                        <td> {{ \App\Model\Brand::all()->count() }} </td>
                                        <td> {{ \App\Model\Category::all()->count() }} </td>
                                        <td> {{ \Auth::user()->where('type', '<>', \App\User::TYPE_ADMIN)->count() }}</td>
                                        <td> {{ \App\Model\Product::all()->count() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>

                        <div class="col-lg-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tỉnh/thành</th>
                                            <th>Số cửa hàng </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Model\City::all() as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td> {{ $item->company->count() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nhãn hiệu </th>
                                        <th>Số sản phẩm </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (\App\Model\Brand::all() as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td> {{ $item->products->count() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Cửa hàng </th>
                                        <th>Số nhân viên </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (\App\Model\Company::all() as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td> {{ $item->staffs->count() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- # Don hang panel -->
        </div>
    </div>
    <!-- /.row -->
@endsection
