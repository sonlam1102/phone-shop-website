<div class="container">
    <div class="modal fade" id="warranty_request" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="warranty_request_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xác nhận yêu cầu </h4>
                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Trạng thái </label>
                        <select class="form-control form-control-sm" name="status">
                            <option value="" selected> ------- </option>
                            @foreach(\App\Model\WarrantyRequest::get_request_status() as $key => $value)
                                <option value="{{$key}}"> {{ $value }}</option>
                            @endforeach
                        </select>
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
        $('button[data-target="#warranty_request"]').click(function () {
            $('#warranty_request #warranty_request_form').attr("action", "/staff/warranty/request/" + $(this).data('id') + "/confirm");
        });
    });
</script>