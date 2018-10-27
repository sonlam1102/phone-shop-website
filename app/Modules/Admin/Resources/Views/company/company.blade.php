@extends('admin::index')

@section('content')

    <div class="container">
        <div class="modal fade" id="add_company" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/company" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm cửa hàng   </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tên cửa hàng  </label>
                                <input type="text" name="name_company" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email"> Địa chỉ </label>
                                <input type="text" name="address_company" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Tỉnh/thành </label>
                                <select class="form-control form-control-sm" name="city">
                                    @if (\App\Model\City::all())
                                        <option value="" selected> ------- </option>
                                        @foreach(\App\Model\City::all() as $item)
                                            <option value="{{$item->id}}"> {{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-default" >Thêm </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Quản lý cửa hàng   </h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_company" >Thêm </button>
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
                        <th>Tên cửa hàng  </th>
                        <th>Địa chỉ </th>
                        <th> Thành phố </th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($company)
                        @foreach ($company as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->address }} </td>
                                <td> {{ ($item->city) ? $item->city->name : "" }} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-code="{{ $item->address }}"
                                            data-city="{{ ($item->city) ? $item->city->name : "" }}"
                                            data-toggle="modal"
                                            data-target="#update_company">
                                        Cập nhật
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