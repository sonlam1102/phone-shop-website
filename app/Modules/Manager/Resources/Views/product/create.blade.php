<div class="container">
    <div class="modal fade" id="add_product" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/manager/product/create" enctype='multipart/form-data'>
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
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mã </label>
                            <input type="text" name="code" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền </label>
                            <input type="text" name="price" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sản xuất </label>
                            <input type="date" name="manu_date" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Thể loại </label>
                            <select class="form-control form-control-sm" name="category">
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
                            <a href="javascript:void(0)" id="add-attribute"> Thêm thuộc tính </a>
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

    function attribute_choose() {
        var html = '<label for="id">ID</label>' +
            '<div class="input-group">' +
            '<span class="input-group-btn">' +
            '<select class="form-control" name="id" id="id">' +
            '<option value="" selected>' + '------' + '</option>' +
            '@foreach (\App\Model\Attribute::all() as $item)' +
            '<option value="{{ $item->id }}">' + '{{ $item->name }}' + '</option>' +
            '@endforeach' +
            '</select>' +
            '</span>' +
            '<span class="input-group-btn">' +
            '<input class="form-control" name="nr">' +
            '</span>' +
            '</div>';
        return html;
    }

    $('#add-attribute').click(function () {
        $('#attribute_field').append(attribute_choose);
    });
</script>