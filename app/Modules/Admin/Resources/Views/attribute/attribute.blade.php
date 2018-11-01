@extends('admin::index')

@section('content')
    <div class="container">
        <div class="modal fade" id="add_attribute" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/attribute/create" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Thuôc tính   </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên thuộc tính  </label>
                                <input type="text" name="name" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Thể loại </label>
                                <select class="form-control form-control-sm" name="category">
                                    <option value="" selected>-----------</option>
                                    @foreach(\App\Model\Category::all() as $item)
                                        <option value="{{$item->id}}"> {{ $item->name }}</option>
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

    <div class="container">
        <div class="modal fade" id="update_attribute" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cập nhật Thuôc tính   </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên thuộc tính  </label>
                                <input type="text" name="name" id="name" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Thể loại </label>
                                <select class="form-control form-control-sm" name="category" id="category">
                                    <option value="" selected>-----------</option>
                                    @foreach(\App\Model\Category::all() as $item)
                                        <option value="{{$item->id}}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-default" >Cập nhật </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="delete_attribute" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xoá thuộc tính  </h4>
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
            <h1 class="page-header">Thuộc tính sản phẩm</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_attribute" >Thêm </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thuộc tính </th>
                        <th>Thể loại </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($attribute)
                        @foreach ($attribute as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->category->name }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-category="{{ $item->category->id }}"
                                            data-toggle="modal"
                                            data-target="#update_attribute">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-category = {{ $item->category->name }}
                                            data-toggle="modal"
                                            data-target="#delete_attribute">
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

            $('button[data-target="#update_attribute"]').click(function () {
                $('#update_attribute .modal-body #name').val($(this).data('name'));
                let category = $(this).data('category');

                $('#update_attribute .modal-body #category').each(function() {
                    $("#update_attribute .modal-body #category option[value=" + category + "]").prop("selected",true);
                });

                $('#update_attribute #update_form').attr("action", "/admin/attribute/" + $(this).data('id') + "/update");
            });

            $('button[data-target="#delete_attribute"]').click(function () {
                $('#delete_attribute .modal-body #warning_message').html("Bạn chắc chắn muốn xoá thuộc tính này: " + $(this).data('name') + " của: " + $(this).data('category'));
                $('#delete_attribute #delete_form').attr("action", "/admin/attribute/" + $(this).data('id') + "/delete");
            })
        });
    </script>
@endsection