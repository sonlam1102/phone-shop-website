@extends('manager::index')

@section('content')

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
                        <th> Trạng thái </th>
                        <th> Phương thức trả tiền </th>
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
                                    @if ($item->status == \App\Model\Order::CANCEL)
                                        <p> Đơn hàng đã bị huỷ </p>
                                    @else
                                        @if($item->status == \App\Model\Order::PENDING)
                                            <a href="/manager/order/{{$item->id}}/review">
                                                <button type="button" class="btn btn-warning">
                                                    Xác nhận đơn hàng
                                                </button>
                                            </a>
                                        @else
                                            <a href="/manager/order/{{$item->id}}/check">
                                                <button type="button" class="btn btn-info">
                                                    Kiểm tra đơn hàng
                                                </button>
                                            </a>
                                        @endif
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