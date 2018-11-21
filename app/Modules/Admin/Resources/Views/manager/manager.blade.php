@extends('admin::index')

@section('content')
    @include('admin::manager.reset')
    @include('admin::manager.create')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Người quản lý </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_manager" >Thêm </button>
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
                        <th> User name   </th>
                        <th> Email  </th>
                        <th> Cửa hàng </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($manager)
                        @foreach ($manager as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->manager ? $item->manager->company->name."-".$item->manager->company->address : "None" }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-toggle="modal"
                                            data-target="#reset_manager_password">
                                     Khôi phục mật khẩu
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection