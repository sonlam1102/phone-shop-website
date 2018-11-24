<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Ngày lập: {{ $export->created_at }}</em>
                    </p>
                    <p>
                        <em>Mã phiếu: <strong>#{{ $export->id }}</strong></em>
                    </p>

                    <p>
                        <em>Cửa hàng: <strong>{{ $export->company->name }}</strong></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Phiếu chi </h1>
                </div>
                <div class="text-lg-left">
                    {{--<p>Họ tên người đặt: {{ $order->name }}</p>--}}
                    {{--<p>Địa chỉ: {{ $order->address }}</p>--}}
                    {{--<p>Số điện thoại: {{ $order->phone }}</p>--}}
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Mã sản phẩm </th>
                        <th class="text-center">Giá tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($export->import->products as $item)
                        <tr>
                            <td class="col-md-9"><em>{{ $item->product_code->product->name }}</em></td>
                            <td class="col-md-1" style="text-align: center"> {{ $item->product_code->code }} </td>
                            <td class="col-md-1 text-center">{{ $item->product_code->product->original_price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-right"><h4><strong>Tổng: </strong></h4></td>
                        <td>   </td>
                        <td class="text-center text-danger"><h4><strong>{{ $export->import->total_price() }}</strong></h4></td>
                        <td>   </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td class="text-right"><h4><strong>Phương thức thanh toán: </strong></h4></td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td class="text-center text-danger"><h4><strong>{{ $order->method() }}</strong></h4></td>--}}
                    {{--</tr>--}}

                    <tr>
                        <td class="text-right"><h4><strong> Nhân viên: </strong></h4></td>
                        <td>   </td>
                        <td class="text-center text-danger"><h4><strong>{{ $export->import->user->fullname() }}</strong></h4></td>
                        <td>   </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body {
        margin-top: 20px;
    }
</style>