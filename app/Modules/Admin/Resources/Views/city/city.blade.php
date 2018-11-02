@extends('admin::index')

@section('content')
    @include('admin::city.create')
    @include('admin::city.update')
    @include('admin::city.delete')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tỉnh/ Thành phố  </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_city" >Thêm </button>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên tỉnh/thành  </th>
                        <th>Mã bưu chính </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($city)
                        @foreach ($city as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->code }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-code="{{ $item->code }}"
                                            data-toggle="modal"
                                            data-target="#update_city">
                                        Cập nhật
                                    </button>

                                    <button
                                            type="button"
                                            class="btn btn-danger "
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-toggle="modal"
                                            data-target="#delete_city">
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