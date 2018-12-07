@if($order->status == \App\Model\Order::SUCCESS || $order->status == \App\Model\Order::CONFIRM)
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">

                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <h1>Phiếu giao hàng</h1>
                    </div>
                    <div class="text-lg-left">
                        <p>Họ tên người nhận: {{ $order->name }}</p>
                        <p>Địa chỉ: {{ $order->address }}</p>
                        <p>Số điện thoại: {{ $order->phone }}</p>
                        <p>Mã hoá đơn: <a href="/customer/order/{{ $order->id }}/info"><strong>#{{ $order->id }}</strong></a></p>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Mã sản phẩm </th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($order->subscribed as $item)
                                <tr>
                                    <td class="col-md-9"><em>{{ $item->code->product->name }}</em></td>
                                    <td class="col-md-1" style="text-align: center"> {{ $item->code->code }} </td>
                                    <td class="col-md-1 text-center"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            margin-top: 20px;
        }
    </style>
@endif