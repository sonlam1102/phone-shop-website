@if(\Auth::check())
    <div class="container">
        <div class="modal fade" id="customer_order_check" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Đơn hàng của bạn </h4>
                    </div>

                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <td>Mã đơn hàng</td>
                                <td>Người nhận </td>
                                <td>Địa chỉ </td>
                                <td>Ngày đặt</td>
                                <td> Phương thức thanh toán</td>
                                <td> Trạng thái</td>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach(\Auth::user()->orders as $item)
                                    <tr>
                                        <td> {{ $item->id }}</td>
                                        <td> {{ $item->name }}</td>
                                        <td> {{ $item->address }}</td>
                                        <td> {{ $item->created_at }}</td>
                                        <td> {{ $item->method() }}</td>
                                        <td> {{ $item->status() }}</td>
                                        <td>
                                            <a href="/customer/order/{{$item->id}}/info">
                                                <button class="btn btn-info">Chi tiết hoá đơn</button>
                                            </a>

                                            @if ($item->status == \App\Model\Order::PENDING)
                                                <form method="post" action="/customer/order/{{ $item->id }}/cancel">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger">Huỷ hoá đơn</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

    </script>
@endif