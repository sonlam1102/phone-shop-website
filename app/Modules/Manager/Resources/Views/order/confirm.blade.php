@extends('manager::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đơn hàng trong cửa hàng </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="/manager/order/{{ $order->id }}/confirm" id="order_confirm_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Đơn hàng: #{{ $order->id }}</h4>
                        <h4 class="modal-title">Ngày tạo: {{ $order->created_at }}</h4>
                        <h4 class="modal-title">Người đặt: {{ $order->name }}</h4>
                        <h4 class="modal-title">Số điện thoại: {{ $order->phone }}</h4>
                    </div>

                    <div class="modal-body">
                        @foreach($order->cart->products as $item)
                            <div class="md-form mb-5 product_item">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">{{ $item->product->name }}</label>
                                <input type="text" class="product_id" value="{{ $item->product->id }}" hidden>

                                    @for($i=0;$i<$item->quantity;$i++)
                                        <div class="product_codes">
                                            <input type="text" class="form-control validate p_codes">
                                        </div>
                                    @endfor

                            </div>
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" >Cập nhật  </button>
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
    <script>
        function findcodes(obj) {
            let codes = [];

            obj.each(function () {
                codes.push($(this).find('.p_codes').val());
            });

            return codes;
        }

        $("#order_confirm_form").submit(function (e) {
            e.preventDefault();

            let subscribed_product = [];

            $('.product_item').each(function () {
                let code = [];
                let obj = $(this).find('.product_codes');

                code = findcodes(obj);

                let item = {
                    'product_id': $(this).find('.product_id').val(),
                    'codes': code
                };
                subscribed_product.push(item);
            });
            $(this).append('<textarea name="subscribed_item">'+ JSON.stringify(subscribed_product) + '</textarea>');

            $(this).submit();
        });
    </script>
@endsection