<div class="container">
    <div class="modal fade" id="product_import_products" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" enctype='multipart/form-data' id="product-import-product-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nhập sản phẩm </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <a href="javascript:void(0)" id="product-import-product"> Thêm sản phẩm </a>
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
    $(document).ready(function() {
        $('button[data-target="#product_import_products"]').click(function () {
            $("#product-import-product-form").prop('action', "/staff/product/" + $(this).data('id') + "/import");
        });
    });

    function products_add() {
        var html = '<div class="input-group products">' +
            '<span class="input-group-btn">' +
            '<input class="form-control product_code" placeholder="mã sản phẩm (imei hoặc serial)">' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<button type="button" class="btn btn-danger delete_product"> Xoá </button>' +
            '</span>' +
            '</div>';
        return html;
    }

    $('#product-import-product').click(function () {
        $('#product-import-product-form #import_field').append(products_add);
    });

    $('#product-import-product-form').submit(function (e) {
        e.preventDefault();
        let products = [];

        $('.products').each(function () {
            let item = {
                'code': $(this).find('.product_code').val()
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