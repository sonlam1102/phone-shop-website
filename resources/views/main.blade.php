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
    @include('layouts.update_info')
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
            {{--@include('layouts.slider')--}}
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Sản phẩm trong cửa hàng
                    </a>
                    <ul class="list-group">
                        @foreach(\App\Model\Category::all() as $item)
                            <li class="list-group-item"> {{ $item->name }}
                                <span class="label label-primary pull-right">{{ $item->products->sum('quantity') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        {{--<button type="button" class="btn btn-default"><strong>1235  </strong>items</button>--}}
                        <div class="btn-group">
                            {{--<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">--}}
                                {{--Sort Products &nbsp;--}}
                                {{--<span class="caret"></span>--}}
                            {{--</button>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">By Price Low</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#">By Price High</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#">By Popularity</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                {{--<li><a href="#">By Reviews</a></li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    @if(\App\Model\Product::all())
                        <div>
                            <ol class="breadcrumb">
                                <li class="active">Dummy Product</li>
                            </ol>
                        </div>
                        @foreach(\App\Model\Product::all() as $item)
                            <div class="col-md-4 text-center col-sm-6 col-xs-6">
                                <div class="thumbnail product-box">
                                    <img class="product_img" src="{{ $item->img ? $item->img : null }}"  onerror="this.src='/img/dummyimg.png';"/>
                                    <div class="caption">
                                        <h3><a href="#"> {{ $item->name }}</a></h3>
                                        <p>Price : <strong>{{ $item->price }}</strong>  </p>
                                        <p>Brand : <strong>{{ $item->brand->name }}</strong>  </p>
                                        <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
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
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
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
    <!--Slider JavaScript file  -->
</body>
</html>
