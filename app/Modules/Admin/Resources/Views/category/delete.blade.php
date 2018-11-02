<div class="container">
    <div class="modal fade" id="delete_category" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xoá loại sản phẩm  </h4>
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
        $('button[data-target="#delete_category"]').click(function () {
            $('#delete_category .modal-body #warning_message').html("Bạn chắc chắn muốn xoá thể loại này: " + $(this).data('name'));
            $('#delete_category #delete_form').attr("action", "/admin/category/" + $(this).data('id') + "/delete");
        })
    });
</script>