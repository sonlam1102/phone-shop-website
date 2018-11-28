<div class="container">
    <div class="modal fade" id="warranty_request" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="#" id="warranty_request_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Form yêu cầu bảo hành </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mã sản phẩm</label>
                            <input type="text" name="product_code" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" id="warranty_info" ></label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" > Yêu cầu bảo hành </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#warranty_request_form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/customer/warranty/request",
            data: $("#warranty_request_form").serialize(),
            type: 'POST',
            success: function (response) {
                $("#warranty_request_form #warranty_info").text(response);
            }
        });
    });
</script>