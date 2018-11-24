@extends('manager::index')

@section('content')
    @include('manager::import.export_create')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Chi tiết phiếu nhập </h1>
            <p> Họ tên: {{ $import->user->fullname() }}</p>
            <p> Ngày nhâp: {{ $import->created_at }}</p>
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
                        <th> Mã sản phẩm </th>
                        <th> Giá </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($import->products)
                        @foreach ($import->products as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->product_code->product->name }} </td>
                                <td> {{ $item->product_code->code }} </td>
                                <td> {{ $item->product_code->product->original_price }} </td>
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
            <p>Total: {{ $import->total_price() }}</p>
        </div>
        <div class="col-lg-8">
            @if(!$import->export)
                <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#add_export"
                        data-import="{{ $import->id }}">
                    Tạo phiếu xuất
                </button>
            @endif
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