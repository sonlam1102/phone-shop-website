@extends('manager::index')

@section('content')
    <div class="container">
        <div class="modal fade" id="add_product" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/manager/product" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Tỉnh/ Thành phố   </h4>
                        </div>

                        <div class="modal-body">

                            <div class="md-form mb-5">
                                <div class="kv-product">
                                    <div class="file-loading">
                                        <input id="product-img" name="product_img" type="file" style="display: none">
                                    </div>
                                </div>
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên </label>
                                <input type="text" name="name" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Mã </label>
                                <input type="text" name="code" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Giá tiền </label>
                                <input type="text" name="price" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sản xuất </label>
                                <input type="date" name="manu_date" class="form-control validate">
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

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Nhãn hiệu </label>
                                <select class="form-control form-control-sm" name="brand">
                                    <option value="" selected>-----------</option>
                                    @foreach(\App\Model\Brand::all() as $item)
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

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm trong cửa hàng </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product" >Thêm </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm  </th>
                        <th>Thể loại </th>
                        <th> Nhãn hiệu </th>
                        <th> Ngày sản xuất </th>
                        <th> Giá </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($product)
                        @foreach ($product as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->category->name }} </td>
                                <td> {{ $item->brand->name }} </td>
                                <td> {{ $item->manufacture_date }} </td>
                                <td> {{ $item->price }} </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
    <script>
        $("#product-img").fileinput({
            overwriteInitial: true,
            display: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            defaultPreviewContent: '<img src="/img/product.png"><br><strong>Nhấn vào để thay đổi </strong>',
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
        });
    </script>

    <style>
        img {
            max-width: 300px;
            max-height: 500px;
        }

        .kv-product button {
            display: none;
        }

        .kv-product .krajee-default.file-preview-frame,.kv-product .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-product {
            display: inline-block;
        }
        .kv-product .file-input {
            display: table-cell;
            width: 213px;
        }
    </style>

@endsection