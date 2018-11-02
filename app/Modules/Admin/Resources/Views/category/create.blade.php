<div class="container">
    <div class="modal fade" id="add_category" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/admin/category/create" >
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm loại sản phẩm  </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm </label>
                            <input type="text" name="name_category" class="form-control validate">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                        <button type="submit" class="btn btn-default" >Thêm   </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>