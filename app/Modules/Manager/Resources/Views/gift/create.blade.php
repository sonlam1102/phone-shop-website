<div class="container">
    <div class="modal fade" id="add_gifts" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/manager/gift/create" id="create_gift">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm khuyến mãi mới   </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền giảm </label>
                            <input type="text" name="discount" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm </label>
                            <select class="form-control form-control-sm" name="product">
                                <option value="" selected>-----------</option>
                                @foreach(\Auth::user()->manager->company->products as $item)
                                    <option value="{{$item->id}}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mô tả  </label>
                            <textarea type="date" name="description" class="form-control validate"> </textarea>
                        </div>


                        <div class="md-form mb-5">
                            <a href="javascript:void(0)" id="add-gift"> Thêm sản phẩm tặng kèm </a>
                        </div>

                        <div class="md-form mb-5" id="product_gift_item">

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

<script>
    function gift_choose() {
        var html = '<div class="input-group product_gift_accessories">' +
            '<span class="input-group-btn">' +
            '<select class="form-control product_accessories_id">' +
            '<option value="" selected>' + '------' + '</option>' +
            '@foreach (\Auth::user()->manager->company->products as $item)' +
            '<option value="{{ $item->id }}">' + '{{ $item->name }}' + '</option>' +
            '@endforeach' +
            '</select>' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<input type="number" class="form-control product_accessories_quantity">' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<button type="button" class="btn btn-danger delete_accessories"> Xoá </button>' +
            '</span>' +
            '</div>';
        return html;
    }


    $('#add-gift').click(function () {
        $('#create_gift #product_gift_item').append(gift_choose);
    });

    $('#create_gift').submit(function (e) {
        e.preventDefault();
        let attributes = [];

        $('.product_gift_accessories').each(function () {
            let item = {
                'item': $(this).find('.product_accessories_id').val(),
                'quantity': $(this).find('.product_accessories_quantity').val()
            };
            attributes.push(item);
        });

        $(this).append('<textarea name="accessories">'+ JSON.stringify(attributes) + '</textarea>');

        $(this).submit();
    });

    $(document).on('click', '.delete_accessories', function () {
        let attr_obj = $(this).closest('.product_gift_accessories');
        attr_obj.remove();
    });
</script>