@extends('manager::index')

@section('content')
    @include('manager::gift.create')
    @include('manager::gift.update')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách các sản phẩm được khuyến mãi  </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_gifts" >Thêm </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Sản phẩm  </th>
                        <th> ID Sản phẩm </th>
                        <th> Ngày tạo </th>
                        <th> Phần trăm giảm giá </th>
                        <th> Hoạt động </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($gift)
                        @foreach ($gift as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->product->name }} </td>
                                <td> #{{ $item->product->id }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->discount }} </td>
                                <td> {{ $item->status() }} </td>
                                <td>
                                    <a href="/manager/gift/{{$item->id}}/accessories">
                                        <button class="btn btn-info">
                                            Danh sách sản phẩm tặng kèm
                                        </button>
                                    </a>
                                    <button class="btn btn-warning"
                                            data-toggle="modal"
                                            data-target="#update_gift"
                                            data-id="{{ $item->id }}"
                                            data-description="{{ $item->description }}"
                                            data-discount="{{ $item->discount }}"
                                            data-status="{{ $item->is_active }}">
                                        Chỉnh sửa
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