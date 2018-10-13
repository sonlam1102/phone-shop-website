@extends('admin::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thuộc tính </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thuộc tính </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if ($category)
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->name }} </td>
                        @endif
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
@endsection