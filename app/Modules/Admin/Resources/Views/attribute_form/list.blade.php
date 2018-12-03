@extends('admin::index')

@section('content')
    @include('admin::attribute_form.create')
    @include('admin::attribute_form.update')
    @include('admin::attribute_form.delete')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form thuộc tính sản phẩm</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_attribute_form" >Thêm </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Loại sản phẩm </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($form)
                        @foreach ($form as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->category->name }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-category = "{{ $item->category->id }}"
                                            data-attributes = "{{ $item->attribute_items }}"
                                            data-toggle="modal"
                                            data-target="#update_attribute_form">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-toggle="modal"
                                            data-target="#delete_attribute_form">
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