<div class="container">
    <div class="modal fade" id="delete_attribute_form" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xoá Form thuộc tính  </h4>
                    </div>

                    <div class="modal-body">
                        <h5 id="warning_message"></h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-danger" >Xoá   </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('button[data-target="#delete_attribute_form"]').click(function () {
            $('#delete_attribute_form .modal-body #warning_message').html("Bạn chắc chắn muốn xoá form này !");
            $('#delete_attribute_form #delete_form').attr("action", "/admin/attribute_form/" + $(this).data('id') + "/delete");
        })
    });
</script>