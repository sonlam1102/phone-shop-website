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
    <link href="/css/mislider.css" rel="stylesheet">
    <link href="/css/mislider-skin-cameo.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    @include('customer::customer.order')
    @include('layouts.update_info')
    @include('customer::customer.order_check')
    @include('layouts.warranty')
    @include('customer::warranty.request')
    @include('customer::warranty.request_list')

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
            @include('layouts.search')
        </div>

        <div class="row">
            @include('layouts.slider')
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="/" class="list-group-item active">Tất cả sản phẩm trong cửa hàng
                    </a>
                    <ul class="list-group">
                        @foreach(\App\Model\Category::all() as $item)
                            <form method="get" action="/">
                                <input type="text" value="{{ $item->id }}" name="category" hidden>
                                <li class="list-group-item">
                                    <button class="btn-info" type="submit"> {{ $item->name }} </button>
                                    <span type="submit" class="label label-primary pull-right">{{ $item->products->count() }}</span>
                                </li>
                            </form>

                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <!-- /.row -->
                <div class="row" id="products_field">
                    @if(\App\Model\Product::all())
                        <div>
                            <ol class="breadcrumb">
                                <li class="active">{{ app('request')->input('category') ? \App\Model\Category::find(app('request')->input('category'))->name : "Tất cả" }}</li>
                            </ol>
                        </div>
                        @foreach($product as $item)
                            <div class="col-md-4 text-center col-sm-6 col-xs-6">
                                <div class="thumbnail product-box">
                                    <img class="product_img" src="{{ $item->img ? $item->img : null }}"  onerror="this.src='/img/product.png';"/>
                                    <div class="caption">
                                        <p><strong> {{ $item->name }}</strong></p>
                                        <p>Price : <strong>{{ $item->price }}</strong>  </p>
                                        <p>Brand : <strong>{{ $item->brand->name }}</strong>  </p>
                                        <p>
                                            <a href="javascript:void(0)" class="btn btn-success add_cart" role="button" data-id="{{ $item->id }}">
                                                Thêm vào giỏ hàng
                                                @csrf
                                            </a>
                                            <a href="/product/{{ $item->id }}/info" class="btn btn-primary" role="button">Thông tin sản phẩm</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @include('layouts.dummy_product')
                    @endif
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    {{--<ul class="pagination alg-right-pad">--}}
                        {{--<li><a href="#">&laquo;</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">&raquo;</a></li>--}}
                    {{--</ul>--}}
                    {{ $link }}
                </div>
                <!-- /.row -->
                {{--<!-- /.div -->--}}
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
        .product_img {
            max-width: 162px;
            max-height: 100px;
        }
        .product-box {
            height: 300px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
    <script src="/js/mislider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
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
