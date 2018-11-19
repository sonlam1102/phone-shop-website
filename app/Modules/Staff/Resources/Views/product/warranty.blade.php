<div class="container">
    <div class="modal fade" id="product_warranty" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="update_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nhập thời gian bảo hành sản phẩm </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Thời gian bảo hành (tháng) </label>
                            <input type="text" name="month" id="month" class="form-control validate">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Thêm   </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('button[data-target="#product_warranty"]').click(function () {
            $('#product_warranty .modal-body #month').val($(this).data('month'));
            $('#product_warranty #update_form').attr("action", "/staff/product/warranty/" + $(this).data('id') + "/update");
        });
    });
</script>