@extends('admin::index')

@section('content')
    @include('manager::staff.reset')
    @include('manager::staff.create')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Nhân viên  </h1>
            <h5 class="page-header">
                <p> Cửa hàng: {{ \Auth::user()->company->name }} </p>
                <p> Địa chỉ: {{ \Auth::user()->company->address }}</p>
            </h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_staff" >Thêm </button>
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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($staff)
                        @foreach ($staff as $item)
                            <tr>
                                <td> {{ $item->user->id }} </td>
                                <td> {{ $item->user->name }} </td>
                                <td> {{ $item->user->email }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->user->id }}"
                                            data-name="{{ $item->user->name }}"
                                            data-toggle="modal"
                                            data-target="#reset_staff_password">
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