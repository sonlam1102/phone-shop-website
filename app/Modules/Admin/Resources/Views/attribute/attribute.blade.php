@extends('admin::index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thuộc tính sản phẩm
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_category" >Thêm </button>
            </h1>
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
                                            data-toggle="modal"
                                            data-target="#update_category">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-toggle="modal"
                                            data-target="#delete_category">
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
@endsection