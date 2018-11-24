<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Điện thoại Online </title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/main.css" rel="stylesheet" />
</head>
<body>
@include('customer::customer.order')
@include('layouts.update_info')
@include('customer::customer.order_check')
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Company and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><strong>Điện thoại Online</strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    @include('layouts.admin_bar')
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <h3>Thông tin sản phẩm </h3>
        <a href="/">
            <button class="btn btn-info">
                Trở về trước
            </button>
        </a>
    </div>
    <!-- /.row -->
    <div class="row" id="products_field">
        @csrf
        <div class="col-md-9">
            <!-- /.row -->
            <div class="row form-group">

                <div class="md-form mb-5">
                    <img class="product_img_view" src="{{ $product->img ? $product->img : null }}" onerror="this.src='/img/product.png';"/>
                </div>
                <br>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Tên sản phẩm: </label>
                    <p> {{ $product->name }} </p>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Loại sản phẩm: </label>
                    <p> {{ $product->category->name }} </p>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Ngày sản xuất: </label>
                    <p> {{ $product->manufacture_date }} </p>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Gía: </label>
                    <p> {{ $product->price }} </p>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Thời gian bảo hành: </label>
                    <p> {{ $product->warranty_month }} </p>
                </div>

                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Thông số: </label>
                    <table class="table">
                        <thead>
                            <th> Thuộc tính </th>
                            <th> Giá trị </th>
                        </thead>
                        <tbody>
                            @foreach($product->attribute as $item)
                                <tr>
                                    <td> {{ $item->attribute->name }} </td>
                                    <td> {{ $item->value }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <hr>

                <div class="md-form mb-5">
                    <a href="javascript:void(0)" class="btn btn-success add_cart" role="button" data-id="{{ $product->id }}">
                        Thêm vào giỏ hàng
                        @csrf
                    </a>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!--Footer -->
@include('layouts.footer')
<!--Footer end -->
<!--Core JavaScript file  -->
<!--bootstrap JavaScript file  -->
<style>
    .product_img_view {
        max-width: 162px;
        max-height: 300px;
    }
    .product-box {
        height: 300px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
<script>
    $("#products_field").on('click', '.add_cart', function () {
        let url = '/customer/cart/product/'+ $(this).data('id') +'/add';
        let token = $(this).find('input[name="_token"]').val();

        $.ajax({
            type: "POST",
            url: url,
            data: {_token: token}
        }).done(function () {
            location.reload();
        });
    });
</script>
</body>
</html>
