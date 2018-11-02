<div class="container">
    <div class="modal fade" id="update_city" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="update_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật    </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tỉnh/thành  </label>
                            <input type="text" name="name_city" id="name_city" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mã bưu chính   </label>
                            <input type="text" name="code_city" id="code_city" class="form-control validate">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Cập nhật  </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('button[data-target="#update_city"]').click(function () {
            $('#update_city .modal-body #name_city').val($(this).data('name'));
            $('#update_city .modal-body #code_city').val($(this).data('code'));
            $('#update_city #update_form').attr("action", "/admin/city/" + $(this).data('id') + "/update");
        });
    });
</script>
