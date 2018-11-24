@extends('manager::index')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách các phiếu chi </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Đại diện công ty </th>
                        <th> Đối tác nhập hàng </th>
                        <th> Ngày tạo  </th>
                        <th> Số sản phẩm nhập </th>
                        <th> Tổng giá </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($export)
                        @foreach ($export as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->import->user->fullname() }} </td>
                                <td> {{ $item->receiver }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->import->products->count() }} </td>
                                <td> {{ $item->import->total_price() }} </td>
                                <td>
                                    <a href="/manager/export/{{ $item->id }}/info">
                                        <button type="button" class="btn btn-info">
                                            Chi tiết
                                        </button>
                                    </a>
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
