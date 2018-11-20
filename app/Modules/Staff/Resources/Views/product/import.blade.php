<div class="container">
    <div class="modal fade" id="import_products" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/staff/product/import" enctype='multipart/form-data' id="import-product-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nhập sản phẩm </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <a href="javascript:void(0)" id="import-product"> Thêm sản phẩm </a>
                        </div>

                        <div class="md-form mb-5" id="import_field">

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
    $("#add_product #product-img").fileinput({
        overwriteInitial: true,
        display: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        defaultPreviewContent: '<img src="/img/product.png"><br><strong>Nhấn vào để thay đổi </strong>',
        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
    });

    function products_add() {
        var html = '<div class="input-group products">' +
            '<span class="input-group-btn">' +
            '<select class="form-control product_id">' +
            '<option value="" selected>' + '------' + '</option>' +
            '@foreach (\Auth::user()->staff_info->company->products as $item)' +
            '<option value="{{ $item->id }}">' + '{{ $item->name }}' + '</option>' +
            '@endforeach' +
            '</select>' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<input class="form-control product_code" placeholder="mã sản phẩm (imei hoặc serial)">' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<input class="form-control month" placeholder="Tháng bảo hành">' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<button type="button" class="btn btn-danger delete_product"> Xoá </button>' +
            '</span>' +
            '</div>';
        return html;
    }

    $('#import-product').click(function () {
        $('#import_field').append(products_add);
    });

    $('#import-product-form').submit(function (e) {
        e.preventDefault();
        let products = [];

        $('.products').each(function () {
            let item = {
                'product_id': $(this).find('.product_id').val(),
                'code': $(this).find('.product_code').val(),
                'month': $(this).find('.month').val()
            };
            products.push(item);
        });

        $(this).append('<textarea name="data">'+ JSON.stringify(products) + '</textarea>');

        $(this).submit();
    });

    $(document).on('click', '.delete_product', function () {
        let attr_obj = $(this).closest('.products');
        attr_obj.remove();
    });
</script>