<div class="container">
    <div class="modal fade" id="add_export" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/manager/export/create" id="create-export">
                @csrf
                <input type="text" name="user" value="{{ \Auth::user()->id }}" hidden>
                <input type="text" name="company" value="{{ \Auth::user()->company->id }}" hidden>
                <input type="text" name="import" id="import" hidden>

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Phiếu xuất  </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên đối tác nhập hàng </label>
                            <input type="text" name="receiver" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Địa chỉ (không bắt buộc) </label>
                            <input type="text" name="receiver_address" class="form-control validate">
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Thêm </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('button[data-target="#add_export"]').click(function () {
            $('#add_export #import').val($(this).data('import'));
        });
    });
</script>