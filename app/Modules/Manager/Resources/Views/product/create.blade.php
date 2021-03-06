<div class="container">
    <div class="modal fade" id="add_product" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/manager/product/create" enctype='multipart/form-data' id="create-product">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm sản phẩm   </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <div class="kv-product">
                                <div class="file-loading">
                                    <input id="product-img" name="product_img" type="file" style="display: none">
                                </div>
                            </div>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên </label>
                            <input type="text" name="name" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền </label>
                            <input type="text" name="price" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá gốc </label>
                            <input type="text" name="original_price" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Bảo hành  </label>
                            <input type="number" name="warranty_month" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sản xuất </label>
                            <input type="date" name="manu_date" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm </label>
                            <select class="form-control form-control-sm" name="category" id="category_id">
                                <option value="" selected>-----------</option>
                                @foreach(\App\Model\Category::all() as $item)
                                    <option value="{{$item->id}}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Nhãn hiệu </label>
                            <select class="form-control form-control-sm" name="brand">
                                <option value="" selected>-----------</option>
                                @foreach(\App\Model\Brand::all() as $item)
                                    <option value="{{$item->id}}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mô tả  </label>
                            <textarea type="date" name="description" class="form-control validate"> </textarea>
                        </div>


                        <div class="md-form mb-5">
                            <a href="javascript:void(0)" id="add-attribute"> Thêm thuộc tính </a>
                            <a href="javascript:void(0)" id="add-attribute-by-form"> Thêm thuộc theo form </a>
                        </div>

                        <div class="md-form mb-5" id="attribute_field">

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

    function attribute_choose_create() {
        var html = '<div class="input-group attributes">' +
            '<span class="input-group-btn">' +
            '<select class="form-control attribute_id">' +
            '<option value="" selected>' + '------' + '</option>' +
            '@foreach (\App\Model\Attribute::all() as $item)' +
            '<option value="{{ $item->id }}">' + '{{ $item->name }}' + '</option>' +
            '@endforeach' +
            '</select>' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<input class="form-control attribute_value">' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<button type="button" class="btn btn-danger delete_attribute"> Xoá </button>' +
            '</span>' +
            '</div>';
        return html;
    }

    $('.attribute_id').each(function () {
        console.log($(this).val())
    });

    $('#add-attribute').click(function () {
        $('#create-product #attribute_field').append(attribute_choose_create);
    });

    $('#create-product').submit(function (e) {
        e.preventDefault();
        let attributes = [];

        $('.attributes').each(function () {
            let item = {
                'attribute': $(this).find('.attribute_id').val(),
                'value': $(this).find('.attribute_value').val()
            }
            attributes.push(item);
        });

        $(this).append('<textarea name="attributes">'+ JSON.stringify(attributes) + '</textarea>');

        $(this).submit();
    });

    $(document).on('click', '.delete_attribute', function () {
        let attr_obj = $(this).closest('.attributes');
        attr_obj.remove();
    });

    $(document).on('click', '#add-attribute-by-form', function () {
        $.ajax({
            url: "/manager/product/category/" + $('#category_id').find(":selected").val() +"/form",
            type: 'GET',
            success: function (response) {
                let json = JSON.parse(response);
                console.log(json);
                for(let i=0; i<json.length; i++) {
                    $('#create-product #attribute_field').append(attribute_choose_create);
                }
                let i=0;
                $('.attributes').each(function () {
                    $(this).find('.attribute_id').each(function() {
                        $(this).find("option[value=" + json[i].attribute + "]").prop("selected",true);
                    });
                    i++;
                });
            }
        });
    });
</script>