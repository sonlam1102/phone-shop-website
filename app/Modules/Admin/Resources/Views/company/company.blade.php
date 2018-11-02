@extends('admin::index')

@section('content')
    @include('admin::company.create')
    @include('admin::company.update')

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
                        <th> Người quản lý </th>
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
                                <td> {{$item->user ? $item->user->name : ""}} </td>
                                <td>
                                    <button
                                            type="button"
                                            class="btn btn-info"
                                            data-id = "{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-address="{{ $item->address }}"
                                            data-city="{{ ($item->city) ? $item->city->id : "" }}"
                                            data-manager = "{{ $item->user ? $item->user->id : "" }}"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection