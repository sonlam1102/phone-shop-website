<div class="container">
    <div class="modal fade" id="order_confirm" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="order_confirm_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Xác nhận đơn hàng</h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Mã đơn hàng </label>
                            <input type="text" name="order_id" id="order_id" class="form-control validate" disabled>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Người nhận </label>
                            <input type="text" id="name" class="form-control validate" disabled>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Trạng thái hiện tại </label>
                            <input type="text" id="status" class="form-control validate" disabled>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Cập nhật trạng thái </label>
                            <select class="form-control form-control-sm" name="order_status">
                                <option value="" selected> -------- </option>
                                @foreach(\App\Model\Order::get_order_status() as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Cập nhật  </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('button[data-target="#order_confirm"]').click(function () {
            $('#order_confirm .modal-body #order_id').val($(this).data('id'));
            $('#order_confirm .modal-body #status').val($(this).data('status'));
            $('#order_confirm .modal-body #name').val($(this).data('name'));
            $('#order_confirm #order_confirm_form').attr("action", "/manager/order/" + $(this).data('id') + "/confirm");
        });
    });
</script>
