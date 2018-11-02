<div class="container">
    <div class="modal fade" id="delete_city" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xoá thể loại  </h4>
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
        $('button[data-target="#delete_city"]').click(function () {
            $('#delete_city .modal-body #warning_message').html("Bạn chắc chắn muốn xoá tỉnh/thành phố này: " + $(this).data('name'));
            $('#delete_city #delete_form').attr("action", "/admin/city/" + $(this).data('id') + "/delete");
        })
    });
</script>