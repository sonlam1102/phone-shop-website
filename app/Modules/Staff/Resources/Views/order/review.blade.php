@extends('staff::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng trong cửa hàng </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="/staff/order/{{ $order->id }}/confirm" id="order_confirm_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Đơn hàng: #{{ $order->id }}</h4>
                        <h4 class="modal-title">Ngày tạo: {{ $order->created_at }}</h4>
                        <h4 class="modal-title">Người đặt: {{ $order->name }}</h4>
                        <h4 class="modal-title">Số điện thoại: {{ $order->phone }}</h4>
                    </div>

                    <div class="modal-body">
                        @foreach($order->subscribed as $item)
                            <div class="md-form mb-5 product_item">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">{{ $item->code->product->name }}</label>
                                <p> Mã sản phẩm:  {{ $item->code->code }} </p>
                                <p>Hạn bảo hành:  {{ $item->code->warranty->expired() }} </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
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