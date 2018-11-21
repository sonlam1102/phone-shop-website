<div class="container">
    <div class="modal fade" id="update_gift" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="update_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật khuyến mãi </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền giảm </label>
                            <input type="text" name="discount" id="discount" class="form-control validate">
                        </div>


                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mô tả  </label>
                            <textarea type="date" name="description" id="description" class="form-control validate"> </textarea>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mô tả  </label>
                            <select class="form-control form-control-sm" name="status" id="status">
                                <option value="1"> Kích hoạt </option>
                                <option value="0"> Kết thúc </option>
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

<script>
    $(document).ready(function () {
        $('button[data-target="#update_gift"]').click(function () {
            $('#update_gift .modal-body #discount').val($(this).data('discount'));
            $('#update_gift .modal-body #description').val($(this).data('description'));

            let status = $(this).data('status');

            $('#update_gift .modal-body #status').each(function() {
                $("#update_gift .modal-body #status option[value=" + status + "]").prop("selected", true);
            });

            $('#update_gift #update_form').attr("action", "/manager/gift/" + $(this).data('id') + "/update");
        });
    });
</script>