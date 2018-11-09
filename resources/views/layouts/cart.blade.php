@if (\Auth::check())
    <li id="drop_menu_cart">
        @if(\Auth::user()->current_cart() && \Auth::user()->current_cart()->products && !empty(\Auth::user()->current_cart()->products))
            <a href="javascript:void(0)" data-toggle="dropdown" >Giỏ hàng </a>
            <ul class="dropdown-menu cart_drop_menu" aria-labelledby="dropdownMenu">
                <div class="input-group">
                    <h4> Giỏ hàng hiện tại </h4>
                </div>

                <div class="input-group">
                    <table id="product_cart_table">
                        @foreach(\Auth::user()->current_cart()->products as $item)
                            <tr>
                                <td hidden><input class="id" type="number" value="{{ $item->id }}" hidden></td>
                                <td hidden><input class="product_id" type="number" value="{{ $item->product->id }}" hidden></td>
                                <td class="product_item_table">{{ $item->product->name }}</td>
                                <td class="product_item_table"><img class="product_cart_img" src="{{ $item->product->img }}" onerror="this.src='/img/product.png'"></td>
                                <td class="product_item_table">
                                    <input class="quantity" type="number" value="{{ $item->quantity }}" style="max-width: 60px;">
                                </td>
                                <td class="product_item_table">
                                    <button class="btn btn-danger delete_cart_product"> Delete
                                        <input class="id" type="number" value="{{ $item->id }}" hidden>
                                        @csrf
                                        @method('DELETE')
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-info" id="cart_update"> Cập nhật
                                    @csrf
                                    @method('PUT')
                                </button>
                            </span>

                    <span class="input-group-btn">
                                <button class="btn btn-info" id="cart_create_order"> Tạo đơn hàng
                                    @csrf
                                    @method('DELETE')
                                </button>
                            </span>
                </div>
            </ul>
        @endif
    </li>
@endif
<script>
    $('ul.dropdown-menu.cart_drop_menu').on('click', function(event){
        // The event won't be propagated up to the document NODE and
        // therefore delegated events won't be fired
        event.stopPropagation();
    });

    $('#cart_update').on('click', function () {
        let data = [];
        let token = $(this).find('input[name="_token"]').val();
        let method = $(this).find('input[name="_method"]').val();

        $("#product_cart_table").find('tr').each(function () {
            let item = {
                'id': $(this).find('.id').val(),
                'quantity': $(this).find('.quantity').val()
            };
            data.push(item);
        });

        $.ajax({
            type: "POST",
            url: '/customer/cart/product/update',
            data: {_token: token, _method: method, data: data}
        }).done(function () {
            location.reload();
        });
    });

    $("#product_cart_table").find('tr').each(function () {
        $(this).find('.delete_cart_product').on('click', function () {
            let url = '/customer/cart/product/' + $(this).find('.id').val() + '/delete';
            let token = $(this).find('input[name="_token"]').val();
            let method = $(this).find('input[name="_method"]').val();

            $.ajax({
                type: "POST",
                url: url,
                data: {_token: token, _method: method }
            }).done(function () {
                location.reload();
            });
        });
    });
</script>