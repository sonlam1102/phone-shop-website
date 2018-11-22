@extends('manager::index')

@section('content')
    @include('manager::order.order_confirm')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng trong cửa hàng </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Họ tên người đặt  </th>
                        <th> Đia chỉ </th>
                        <th> Số điện thoại </th>
                        <th> Tổng tiền </th>
                        <th> Ngày đặt </th>
                        <th> Phương thức giao hàng </th>
                        <th> Trạng thái </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($order)
                        @foreach ($order as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->address }} </td>
                                <td> {{ $item->phone }} </td>
                                <td> {{ $item->total_price }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->status() }} </td>
                                <td> {{ $item->method() }} </td>
                                <td>
                                    @if(!$item->check || ($item->check && $item->check->user->id == \Auth::user()->id))
                                        <a href="/manager/order/{{$item->id}}/review">
                                            <button type="button" class="btn btn-warning">
                                                Xác nhận đơn hàng
                                            </button>
                                        </a>
                                    @else
                                        <p> Xác nhận bởi: {{ $item->check->user->userinfo ? $item->check->user->userinfo->fullname : $item->check->user->name }}</p>
                                    @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>

    <style>
        img {
            max-width: 300px;
            max-height: 500px;
        }

        .kv-product button {
            display: none;
        }

        .kv-product .krajee-default.file-preview-frame,.kv-product .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-product {
            display: inline-block;
        }
        .kv-product .file-input {
            display: table-cell;
            width: 213px;
        }
    </style>

@endsection