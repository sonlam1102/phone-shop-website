<div class="container">
    <div class="modal fade" id="reset_manager_password" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="reset_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Khôi phục mật khẩu </h4>
                    </div>

                    <div class="modal-body">
                        <h5 id="warning_message"></h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-danger" > Đồng ý    </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('button[data-target="#reset_manager_password"]').click(function () {
            $('#reset_manager_password .modal-body #warning_message').html("Bạn chắc chắn muốn khôi phục mật khẩu cho user : " + $(this).data('name'));
            $('#reset_manager_password #reset_form').attr("action", "/admin/manager/" + $(this).data('id') + "/reset");
        })
    });
</script>