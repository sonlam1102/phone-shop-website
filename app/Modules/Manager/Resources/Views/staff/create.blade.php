<div class="container">
    <div class="modal fade" id="add_staff" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/manager/staff/create" >
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm nhân viên cửa hàng  </h4>
                        <h9 class="page-header">
                            <p> Cửa hàng: {{ \Auth::user()->manager->company->name }} </p>
                            <p> Địa chỉ: {{ \Auth::user()->manager->company->address }}</p>
                        </h9>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Username</label>
                            <input type="text" name="name" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Email</label>
                            <input type="text" name="email" class="form-control validate">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Thêm  </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>