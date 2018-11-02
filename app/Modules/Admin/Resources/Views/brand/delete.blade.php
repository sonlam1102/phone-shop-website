<div class="container">
    <div class="modal fade" id="delete_brand" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xoá nhãn hiệu </h4>
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
        $('button[data-target="#delete_brand"]').click(function () {
            $('#delete_brand .modal-body #warning_message').html("Bạn chắc chắn muốn xoá nhãn hiệu này: " + $(this).data('name') + " của: " + $(this).data('category'));
            $('#delete_brand #delete_form').attr("action", "/admin/brand/" + $(this).data('id') + "/delete");
        })
    });
</script>
