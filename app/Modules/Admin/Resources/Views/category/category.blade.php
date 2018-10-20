@extends('admin::index')

@section('content')

    <div class="container">
        <div class="modal fade" id="add_city" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form method="post" action="/admin/category" >
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm thể loại  </h4>
                        </div>

                        <div class="modal-body">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Thể loại </label>
                                <input type="text" name="name_category" class="form-control validate">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                            <button type="submit" class="btn btn-default" >Thêm   </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thể loại
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_city" >Thêm </button>
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
                        <th>Tên thể loại  </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($category)
                        @foreach ($category as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> {{ $item->name }} </td>
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