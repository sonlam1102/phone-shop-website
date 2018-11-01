@extends('admin::index')

@section('content')
    <div class="container">
        <div class="modal fade" id="reset_manager_password" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="reset_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Khôi phục mật khẩu </h4>
                        </div>

                        <div class="modal-body">
                            <h5 id="warning_message"></h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-danger" > Đồng ý    </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="add_manager" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/manager/create" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm người quản lý cửa hàng  </h4>
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

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Người quản lý </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_manager" >Thêm </button>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> User name   </th>
                        <th> Email  </th>
                        <th> Cửa hàng </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($manager)
                        @foreach ($manager as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->company ? $item->company->address : "None" }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-toggle="modal"
                                            data-target="#reset_manager_password">
                                     Khôi phục mật khẩu
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.col-lg-4 (nested) -->
        <div class="col-lg-8">
            <div id="morris-bar-chart"></div>
        </div>
        <!-- /.col-lg-8 (nested) -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('button[data-target="#reset_manager_password"]').click(function () {
                $('#reset_manager_password .modal-body #warning_message').html("Bạn chắc chắn muốn khôi phục mật khẩu cho user : " + $(this).data('name'));
                $('#reset_manager_password #reset_form').attr("action", "/admin/manager/" + $(this).data('id') + "/reset");
            })
        });
    </script>

@endsection