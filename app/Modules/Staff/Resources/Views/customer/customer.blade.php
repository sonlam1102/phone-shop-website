@extends('staff::index')

@section('content')
    @include('staff::customer.change')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách khách hàng </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> Họ tên </th>
                        <th> Đia chỉ </th>
                        <th> Số điện thoại </th>
                        <th> Loại khách hàng </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($customer)
                        @foreach ($customer as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->fullname() }} </td>
                                <td> {{ $item->userinfo->address }} </td>
                                <td> {{ $item->userinfo->phone }} </td>
                                <td> {{ $item->customer ? $item->customer->kind() : 'chưa phân loại' }} </td>
                                <td>
                                    <button type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-email = "{{ $item->email }}"
                                            data-name = "{{ $item->fullname() }}"
                                            data-address = "{{ $item->userinfo->address }}"
                                            data-phone = "{{ $item->userinfo->phone }}"
                                            data-toggle="modal"
                                            data-target="#customer_change_type">
                                        Chuyển đổi khách hàng
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