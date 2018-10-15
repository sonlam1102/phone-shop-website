<div class="container">
    <div class="modal fade" id="userinfo_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <form method="post" action="{{ route('update_info') }}" enctype='multipart/form-data' >
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thông tin người dùng </h4>
                    </div>

                    <div class="modal-body">

                        <div class="md-form mb-5">
                            <div id="kv-avatar-errors-2" class="center-block"></div>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-2" name="img" type="file" style="display: none">
                                </div>
                            </div>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Tên </label>
                            <input type="text" name="fullname" class="form-control validate" value="{{ $data ? $data->fullname : null }}">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Địa chỉ </label>
                            <input type="text" name="address" class="form-control validate" value="{{ $data ? $data->address : null }}">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Thành phố sinh sống </label>
                            <select class="form-control form-control-sm" name="city">
                                @if (\App\Model\City::all())
                                    @foreach(\App\Model\City::all() as $item)
                                        <option value="{{$item->id}}" {{$data ? $data->city->id == $item->id ? 'selected' : '' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Số CMND </label>
                            <input type="text" name="cmnd" class="form-control validate" value="{{ $data ? $data->cmnd : null }}">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Điện thoại</label>
                            <input type="text" name="phone" class="form-control validate" value="{{ $data ? $data->phone : null }}">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sinh </label>
                            <input type="date" name="birthday" class="form-control validate" value="{{ $data ? $data->birthday : null }}">
                        </div>

                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Đổi mật khẩu </label>
                            <input type="password" name="newpass" class="form-control validate" placeholder="Nhập mật khẩu mới" >
                            <br>
                            <input type="password" name="retype_newpass" class="form-control validate" placeholder="Nhập lại mật khẩu mới" >
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