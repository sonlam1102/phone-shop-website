@if(\Auth::check())
    <div class="container">
        <div class="modal fade" id="customer_warranty_request_check" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Đơn hàng của bạn </h4>
                    </div>

                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <td>Mã yêu cầu</td>
                                <td></td>
                                <td>Mã sản phẩm </td>
                                <td>Tên sản phẩm </td>
                                <td> Ngày yêu cầu </td>
                                <td>Trạng thái</td>
                            </thead>
                            <tbody>
                            @foreach(\Auth::user()->warranty_request as $item)
                                <tr>
                                    <td> {{ $item->id }}</td>
                                    <td>
                                        <img class="product_cart_img" src="{{ $item->code->product->img }}" onerror="this.src='/img/product.png'">
                                    </td>
                                    <td> {{ $item->code->code }}</td>
                                    <td> {{ $item->code->product->name }}</td>
                                    <td> {{ $item->created_at }}</td>
                                    <td> {{ $item->status() }}</td>
                                    <td>
                                        @if ($item->status == \App\Model\WarrantyRequest::PENDING)
                                            <form method="post" action="/customer/warranty/request/{{ $item->id }}/cancel">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Huỷ yêu cầu</button>
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