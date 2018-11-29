@extends('staff::index')

@section('content')
    @include('staff::warranty.check')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách yêu cầu bảo hành </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm </th>
                        <th>Mã sản phẩm </th>
                        <th>Khách hàng yêu cầu </th>
                        <th> Ngày yêu cầu </th>
                        <th> Nguyên nhân </th>
                        <th> Tình trạng </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($requests)
                        @foreach ($requests as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->code->product->name }} </td>
                                <td> {{ $item->code->code }} </td>
                                <td> {{ $item->user->fullname() }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->reason }} </td>
                                <td> {{ $item->status() }} </td>
                                <td>
                                    @if ($item->status != \App\Model\WarrantyRequest::CANCEL)
                                        <button type="button"
                                                class="btn btn-info"
                                                data-id = "{{ $item->id }}"
                                                data-toggle="modal"
                                                data-target="#warranty_request">
                                            Xác nhận tình trạng
                                        </button>
                                    @endif
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