@if(\Auth::check())
    <div class="container">
        <div class="modal fade" id="add_order_cart" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/customer/order/create" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Đơn hàng </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên người nhận:  </label>
                                <input type="text" name="name" class="form-control validate" value="{{ $data ? $data->fullname : null }}">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Số điện thoại :  </label>
                                <input type="text" name="phone" class="form-control validate" value="{{ $data ? $data->phone : null }}">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Địa chỉ :  </label>
                                <input type="text" name="address" class="form-control validate" value="{{ $data ? $data->address : null }}">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Thành phố </label>
                                <select class="form-control form-control-sm" name="city">
                                    @foreach(\App\Model\City::all() as $item)
                                        <option value="{{$item->id}}" {{ $data ? $data->city->id == $item->id ? 'selected' : '' : '' }}> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if(\Auth::user()->current_cart())
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="defaultForm-email">Sản phẩm đã đặt </label>
                                    <input name="cart" value="{{ \Auth::user()->current_cart()->id }}" hidden>
                                    <table class="table" border="1">
                                        @foreach(\Auth::user()->current_cart()->products as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->product->name }}
                                                    @if($item->product->gift)
                                                        KM: {{ $item->product->gift->discount }} %
                                                    @endif
                                                </td>
                                                <td><img class="product_cart_img" src="{{ $item->product->img }}" onerror="this.src='/img/product.png'"></td>
                                                <td>{{ $item->product->product_price() }}</td>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                            @if($item->product->gift)
                                                @foreach($item->product->gift->accessories as $it_gift)
                                                    Sản phẩm khuyến mãi
                                                    <tr>
                                                        <td>
                                                            {{ $it_gift->product->name }}
                                                        </td>
                                                        <td><img class="product_cart_img" src="{{ $it_gift->product->img }}" onerror="this.src='/img/product.png'"></td>
                                                        <td>0</td>
                                                        <td>{{ $item->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            @endif

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Phương thức thanh toán </label>
                                <select class="form-control form-control-sm" name="method">
                                    @foreach(\App\Model\Order::get_order_method_payment() as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-default" >Thêm </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

    </script>
@endif