<div class="container">
    <div class="modal fade" id="update_attribute" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="update_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật Thuôc tính   </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên thuộc tính  </label>
                            <input type="text" name="name" id="name" class="form-control validate">
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
        $('button[data-target="#update_attribute"]').click(function () {
            $('#update_attribute .modal-body #name').val($(this).data('name'));
            let category = $(this).data('category');

            $('#update_attribute .modal-body #category').each(function() {
                $("#update_attribute .modal-body #category option[value=" + category + "]").prop("selected",true);
            });

            $('#update_attribute #update_form').attr("action", "/admin/attribute/" + $(this).data('id') + "/update");
        });
    });
</script>