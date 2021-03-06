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

                        @if(\Auth::check() && \Auth::user()->customer)
                            <div class="md-form mb-5">
                                <span class="text-info">
                                    {{ \Auth::user()->customer->kind() }}
                                </span>
                            </div>
                        @endif

                        @if(\Auth::check() && \Auth::user()->type == \App\User::TYPE_MANAGER)
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Công ty đang quản lý:  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> {{ \Auth::user()->manager->company->name }}  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> {{ \Auth::user()->manager->company->address }}  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> {{ \Auth::user()->manager->company->city->name }}  </label>
                            </div>
                        @elseif(\Auth::check() && \Auth::user()->type == \App\User::TYPE_SELLER)
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Công ty:  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> {{ \Auth::user()->staff_info->company->name }}  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> {{ \Auth::user()->staff_info->company->address }}  </label>
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Người quản lý: {{ \Auth::user()->staff_info->company->manager->user->fullname() }} </label>
                            </div>
                        @endif

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
    <script>
        $("#avatar-2").fileinput({
            overwriteInitial: true,
            display: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            elErrorContainer: '#kv-avatar-errors-2',
            defaultPreviewContent: '<img class="avatar_img" src="{{ $data ? $data->img ? $data->img : "/img/avatar.jpg" : "/img/avatar.jpg"}}" onerror="this.src=\'/img/avatar.jpg\';"><br><strong>Nhấn vào để thay đổi </strong>',
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
        });
    </script>

    <style>
        .avatar_img {
            max-width: 300px;
            max-height: 500px;
        }

        .kv-avatar button {
            display: none;
        }
    </style>

</div>