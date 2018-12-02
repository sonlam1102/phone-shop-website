<div class="container">
    <div class="modal fade" id="add_attribute_form" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/admin/attribute_form/create" id="create-attriute-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm thuộc tính   </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm </label>
                            <select class="form-control form-control-sm" name="category">
                                <option value="" selected>-----------</option>
                                @foreach(\App\Model\Category::all() as $item)
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
            '<button type="button" class="btn btn-danger delete_attribute"> Xoá </button>' +
            '</span>' +
            '<span class="input-group-btn">' +
            '</span>' +
            '</div>';
        return html;
    }

    $('.attribute_id').each(function () {
        console.log($(this).val())
    });

    $('#add-attribute').click(function () {
        $('#create-attriute-form #attribute_field').append(attribute_choose_create);
    });

    $('#create-attriute-form').submit(function (e) {
        e.preventDefault();
        let attributes = [];

        $('.attributes').each(function () {
            let item = {
                'attribute': $(this).find('.attribute_id').val(),
            }
            attributes.push(item);
        });

        $(this).append('<textarea name="attributes_form">'+ JSON.stringify(attributes) + '</textarea>');

        $(this).submit();
    });

    $(document).on('click', '.delete_attribute', function () {
        let attr_obj = $(this).closest('.attributes');
        attr_obj.remove();
    });
</script>