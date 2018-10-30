@extends('admin::index')

@section('content')
    <div class="container">
        <div class="modal fade" id="add_brand" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/brand" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm nhãn hiệu  </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên nhãn hiệu </label>
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
                            <button type="submit" class="btn btn-default" >Thêm   </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="update_brand" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cập nhật nhãn hiệu  </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên nhãn hiệu </label>
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
                            <button type="submit" class="btn btn-default" >Cập nhật  </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="modal fade" id="delete_brand" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xoá nhãn hiệu </h4>
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
            <h1 class="page-header">Nhãn hiệu</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_brand" >Thêm </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên nhãn hiệu  </th>
                        <th> Thể loại </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($brand)
                        @foreach ($brand as $item)
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
                                            data-target="#update_brand">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-category="{{ $item->category->name }}"
                                            data-toggle="modal"
                                            data-target="#delete_brand">
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

            $('button[data-target="#update_brand"]').click(function () {
                $('#update_brand .modal-body #name').val($(this).data('name'));

                let category = $(this).data('category');

                $('#update_brand .modal-body #category').each(function() {
                    $("#update_brand .modal-body #category option[value=" + category + "]").prop("selected",true);
                });


                $('#update_brand #update_form').attr("action", "/admin/brand/" + $(this).data('id') + "/update");
            });

            $('button[data-target="#delete_brand"]').click(function () {
                $('#delete_brand .modal-body #warning_message').html("Bạn chắc chắn muốn xoá nhãn hiệu này: " + $(this).data('name') + " của: " + $(this).data('category'));
                $('#delete_brand #delete_form').attr("action", "/admin/brand/" + $(this).data('id') + "/delete");
            })
        });
    </script>
@endsection