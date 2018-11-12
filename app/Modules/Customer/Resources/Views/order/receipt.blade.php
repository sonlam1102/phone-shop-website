<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    {{--<address>--}}
                        {{--<strong>Elf Cafe</strong>--}}
                        {{--<br>--}}
                        {{--2135 Sunset Blvd--}}
                        {{--<br>--}}
                        {{--Los Angeles, CA 90026--}}
                        {{--<br>--}}
                        {{--<abbr title="Phone">P:</abbr> (213) 484-6829--}}
                    {{--</address>--}}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Ngày lập hoá đơn: {{ $order->created_at }}</em>
                    </p>
                    <p>
                        <em>Mã hoá đơn #: {{ $order->id }}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Hoá đơn</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng </th>
                        <th class="text-center">Giá tiền</th>
                        <th class="text-center">Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->cart->products as $item)
                        <tr>
                            <td class="col-md-9"><em>{{ $item->product->name }}</em></td>
                            <td class="col-md-1" style="text-align: center"> {{ $item->quantity }} </td>
                            <td class="col-md-1 text-center">{{ $item->product->price }}</td>
                            <td class="col-md-1 text-center">{{ ($item->product->price)*($item->quantity) }}</td>
                        </tr>
                    @endforeach
                    {{--<tr>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td class="text-right">--}}
                            {{--<p>--}}
                                {{--<strong>Subtotal: </strong>--}}
                            {{--</p></td>--}}
                        {{--<td class="text-center">--}}
                            {{--<p>--}}
                                {{--<strong>{{ $order->cart->total_price() }}</strong>--}}
                            {{--</p></td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td class="text-right"><h4><strong>Tổng: </strong></h4></td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-center text-danger"><h4><strong>{{ $order->cart->total_price() }}</strong></h4></td>
                    </tr>
                    <tr>
                        <td class="text-right"><h4><strong>Phương thức thanh toán: </strong></h4></td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-center text-danger"><h4><strong>{{ $order->method() }}</strong></h4></td>
                    </tr>
                    </tbody>
                </table>
                {{--<button type="button" class="btn btn-success btn-lg btn-block">--}}
                    {{--Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>--}}
                {{--</button></td>--}}
            </div>
        </div>
    </div>
</div>
<style>
    body {
        margin-top: 20px;
    }
</style>