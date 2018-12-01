<div class="container">
    <div class="modal fade" id="customer_change_type" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="" id="customer_change_form">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Chuyển đổi loại khách hàng </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Tên</label>
                            <p id="name"></p>

                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Email</label>
                            <p id="email"></p>

                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Địa chỉ</label>
                            <p id="address"></p>

                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Số điện thoại</label>
                            <p id="phone"></p>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại khách hàng </label>
                            <select class="form-control form-control-sm" name="type">
                                <option value="" selected> ------- </option>
                                @foreach(\App\Model\Customer::get_customer_kinds() as $key => $value)
                                    <option value="{{$key}}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
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
        $('button[data-target="#customer_change_type"]').click(function () {
            $('#customer_change_type #customer_change_form #name').html($(this).data('name'));
            $('#customer_change_type #customer_change_form #email').html($(this).data('email'));
            $('#customer_change_type #customer_change_form #address').html($(this).data('address'));
            $('#customer_change_type #customer_change_form #phone').val($(this).data('phone'));
            $('#customer_change_type #customer_change_form').attr("action", "/manager/customer/" + $(this).data('id') + "/change");
        });
    });
</script>