<div class="container">
    <div class="modal fade" id="add_company" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="/admin/company/create" >
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thêm cửa hàng   </h4>
                    </div>

                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên cửa hàng  </label>
                            <input type="text" name="name_company" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email"> Địa chỉ </label>
                            <input type="text" name="address_company" class="form-control validate">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tỉnh/thành </label>
                            <select class="form-control form-control-sm" name="city">
                                @if (\App\Model\City::all())
                                    <option value="" selected> ------- </option>
                                    @foreach(\App\Model\City::all() as $item)
                                        <option value="{{$item->id}}"> {{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Người quản lý </label>
                            <select class="form-control form-control-sm" name="manager">
                                <option value="" selected> ------- </option>
                                @foreach(\App\User::getManager() as $item)
                                    @if (!$item->company)
                                        <option value="{{$item->id}}"> {{ $item->name."-".$item->email}}</option>
                                    @endif
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