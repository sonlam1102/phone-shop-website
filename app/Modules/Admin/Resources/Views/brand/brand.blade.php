@extends('admin::index')

@section('content')
    @include('admin::brand.create')
    @include('admin::brand.update')
    @include('admin::brand.delete')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nhà sản xuất</h1>
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
                        <th>Tên Nhà sản xuất  </th>
                        <th> Loại sản phẩm sản xuất </th>
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
@endsection