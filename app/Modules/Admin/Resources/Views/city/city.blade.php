@extends('admin::index')

@section('content')

    <div class="container">
        <div class="modal fade" id="add_city" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/city/create" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Tỉnh/ Thành phố   </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên tỉnh/thành:  </label>
                                <input type="text" name="name_city" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Mã bưu chính:  </label>
                                <input type="text" name="code_city" class="form-control validate">
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

    <div class="container">
        <div class="modal fade" id="update_city" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cập nhật    </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tỉnh/thành  </label>
                                <input type="text" name="name_city" id="name_city" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Mã bưu chính   </label>
                                <input type="text" name="code_city" id="code_city" class="form-control validate">
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

    <div class="container">
        <div class="modal fade" id="delete_city" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xoá thể loại  </h4>
                        </div>

                        <div class="modal-body">
                            <h5 id="warning_message"></h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-danger" >Xoá   </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tỉnh/ Thành phố  </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_city" >Thêm </button>
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
                        <th>Tên tỉnh/thành  </th>
                        <th>Mã bưu chính </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($city)
                        @foreach ($city as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->code }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-code="{{ $item->code }}"
                                            data-toggle="modal"
                                            data-target="#update_city">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-toggle="modal"
                                            data-target="#delete_city">
                                        Xoá
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

            $('button[data-target="#update_city"]').click(function () {
                $('#update_city .modal-body #name_city').val($(this).data('name'));
                $('#update_city .modal-body #code_city').val($(this).data('code'));
                $('#update_city #update_form').attr("action", "/admin/city/" + $(this).data('id') + "/update");
            });

            $('button[data-target="#delete_city"]').click(function () {
                $('#delete_city .modal-body #warning_message').html("Bạn chắc chắn muốn xoá tỉnh/thành phố này: " + $(this).data('name'));
                $('#delete_city #delete_form').attr("action", "/admin/city/" + $(this).data('id') + "/delete");
            })
        });
    </script>

@endsection