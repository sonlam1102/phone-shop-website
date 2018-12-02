<div class="container">
    <div class="modal fade" id="update_attribute_form" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/admin/attribute_form/create" id="update-attribute-form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật form thuộc tính   </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm </label>
                            <select class="form-control form-control-sm" name="category" id="category">
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
    $(document).ready(function() {

        $('button[data-target="#update_attribute_form"]').click(function () {
            let category = $(this).data('category');
            let attributes = $(this).data('attributes');

            $('#update_attribute_form .modal-body #category').each(function () {
                $("#update_attribute_form .modal-body #category option[value=" + category + "]").prop("selected", true);
            });

            $('#update-attribute-form #attribute_field').html('');
            for(let i=0; i<attributes.length; i++) {
                $('#update-attribute-form #attribute_field').append(attribute_choose(1));
            }
            let i=0;
            $('.attributes').each(function () {
                $(this).find('.attribute_id').each(function() {
                    $(this).find("option[value=" + attributes[i].attribute_id + "]").prop("selected",true);
                });

                $(this).find('.item_attribute_id').val(attributes[i].id);
                i++;
            });

            $('#update-attribute-form').attr("action", "/admin/attribute_form/" + $(this).data('id') + "/update");

            $('#update-attribute-form #add-attribute').click(function () {
                $('#update-attribute-form #attribute_field').append(attribute_choose);
            });
        });
    });

    function attribute_choose(update=0) {
        let html = '';

        if (update == 0) {
            html = '<div class="input-group attributes">' +
                '<span class="input-group-btn">' +
                '<select class="form-control attribute_id">' +
                '<option value="" selected>' + '------' + '</option>' +
                '@foreach (\App\Model\Attribute::all() as $item)' +
                '<option value="{{ $item->id }}">' + '{{ $item->name }}' + '</option>' +
                '@endforeach' +
                '</select>' +
                '</span>' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-danger delete_attribute">Xoá</button>' +
                '</span>' +
                '<span class="input-group-btn">' +
                '</span>' +
                '</div>';
        }

        if (update == 1) {
            html = '<div class="input-group attributes">' +
                '<input class="form-control item_attribute_id" type="hidden">' +
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
        }

        return html;
    }

    $('.attribute_id').each(function () {
        console.log($(this).val())
    });

    $('#add-attribute').click(function () {
        $('#update-attribute-form #attribute_field').append(attribute_choose(0));
    });

    $('#update-attribute-form').submit(function (e) {
        e.preventDefault();
        let attributes = [];

        $('.attributes').each(function () {
            let item = {
                'id': $(this).find('.item_attribute_id').val(),
                'attribute': $(this).find('.attribute_id').val(),
            };
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