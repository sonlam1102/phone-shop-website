<div class="container">
    <div class="modal fade" id="update_product" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="update_form" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật sản phẩm  </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <div class="kv-product">
                                <div class="file-loading">
                                    <input id="product-update-img" name="product_img" type="file" style="display: none">
                                </div>
                            </div>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên </label>
                            <input type="text" name="name" id="name" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mã </label>
                            <input type="text" name="code" id="code" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền </label>
                            <input type="text" name="price" id="price" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sản xuất </label>
                            <input type="date" name="manu_date" id="manu_date" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Thể loại </label>
                            <select class="form-control form-control-sm" name="category" id="category">
                                <option value="" selected>-----------</option>
                                @foreach(\App\Model\Category::all() as $item)
                                    <option value="{{$item->id}}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Nhãn hiệu </label>
                            <select class="form-control form-control-sm" name="brand" id="brand">
                                <option value="" selected>-----------</option>
                                @foreach(\App\Model\Brand::all() as $item)
                                    <option value="{{$item->id}}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <a href="javascript:void(0)" id="add-attribute"> Thêm thuộc tính </a>
                        </div>

                        <div class="md-form mb-5" id="attribute_field">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Cập nhật </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('button[data-target="#update_product"]').click(function () {
            $('#update_product .modal-body #name').val($(this).data('name'));
            $('#update_product .modal-body #code').val($(this).data('code'));
            $('#update_product .modal-body #manu_date').val($(this).data('manu'));
            $('#update_product .modal-body #price').val($(this).data('price'));
            let category = $(this).data('category');
            let brand = $(this).data('brand');

            $('#update_product .modal-body #category').each(function() {
                $("#update_product .modal-body #category option[value=" + category + "]").prop("selected",true);
            });

            $('#update_product .modal-body #brand').each(function() {
                $("#update_product .modal-body #brand option[value=" + brand + "]").prop("selected",true);
            });


            $('#update_product #update_form').attr("action", "/manager/product/" + $(this).data('id') + "/update");

            $("#update_product #product-update-img").fileinput({
                overwriteInitial: true,
                display: true,
                maxFileSize: 1500,
                showClose: false,
                showCaption: false,
                showBrowse: false,
                browseOnZoneClick: true,
                defaultPreviewContent: '<img src="'+ $(this).data('img') + '" ><br><strong>Nhấn vào để thay đổi </strong>',
                allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
            });
        });

    });
    function attribute_choose() {
        var html = '<label for="id">ID</label>' +
            '<div class="input-group attributes">' +
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
            '</div>';
        return html;
    }
</script>