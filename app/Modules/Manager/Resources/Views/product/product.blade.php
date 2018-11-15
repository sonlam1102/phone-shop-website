@extends('manager::index')

@section('content')
    @include('manager::product.create')
    @include('manager::product.update')
    @include('manager::product.delete')

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
                        <th>Loại sản phẩm </th>
                        <th> Nhãn hiệu </th>
                        <th> Ngày sản xuất </th>
                        <th> Số Seri </th>
                        <th> IMEI</th>
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
                                <td> {{ $item->code }} </td>
                                <td> {{ $item->imei }} </td>
                                <td> {{ $item->price }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-code="{{ $item->code }}"
                                            data-imei="{{ $item->imei }}"
                                            data-category="{{ $item->category->id }}"
                                            data-brand = "{{ $item->brand->id }}"
                                            data-manu = "{{ $item->manufacture_date }}"
                                            data-price = "{{ $item->price }}"
                                            data-img = "{{ $item->img }}"
                                            data-attributes = "{{ $item->attribute }}"
                                            data-quantity = "{{ $item->quantity }}"
                                            data-description = "{{ $item->description }}"
                                            data-toggle="modal"
                                            data-target="#update_product">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-code="{{ $item->code }}"
                                            data-toggle="modal"
                                            data-target="#delete_product">
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