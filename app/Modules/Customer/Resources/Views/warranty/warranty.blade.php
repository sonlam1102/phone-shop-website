<div class="container">
    <div class="modal fade" id="warranty_check" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/customer/warranty/check" id="warranty_check_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tra cứu bảo hành </h4>
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
                        <button type="submit" class="btn btn-default" > Tra cứu  </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let form_data = $("#warranty_check_form").serialize();

    $("#warranty_check_form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/customer/warranty/check",
            data: $("#warranty_check_form").serialize(),
            type: 'POST',
            success: function (response) {
                $("#warranty_info").text(response);
            }
        });
    });
</script>