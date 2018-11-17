<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        @include('layouts.cart')

        @if (!\Auth::check())
            <li><a href="{{ route('login') }}">Đăng nhập </a></li>
            <li><a href="{{ route('register') }}">Đăng ký </a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ \Auth::user()->fullname() }}
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#userinfo_modal" id="update"><strong>Cập nhật thông tin </strong></a>
                    </li>

                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#customer_order_check"><strong> Đơn hàng </strong></a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <strong>Đăng xuất  </strong>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>
        @endif
    </ul>
    {{--<form class="navbar-form navbar-right" role="search">--}}
        {{--<div class="form-group">--}}
            {{--<input type="text" placeholder="Nhập vào từ khoá tìm kiếm  ..." class="form-control">--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-primary">Tìm kiếm </button>--}}
    {{--</form>--}}
    <style>
        .product_cart_img {
            max-width: 60px;
            max-height: 60px;
        }
        .product_item_table {
            padding: 35px 32px;
        }
    </style>
</div>