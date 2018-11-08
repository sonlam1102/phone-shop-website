<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

        @if (\Auth::check())
            <li><a href="#" data-toggle="dropdown" >Giỏ hàng </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <div class="input-group">
                        <table class="table">
                            @foreach(\Auth::user()->current_cart()->products as $item)
                                <tr>
                                    <td><img class="product_cart_img" src="{{ $item->product->img }}" onerror="this.src='/img/product.png'"></td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </ul>
            </li>
        @endif

        @if (!\Auth::check())
            <li><a href="{{ route('login') }}">Đăng nhập </a></li>
            <li><a href="{{ route('register') }}">Đăng ký </a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ \Auth::user()->userinfo ?  \Auth::user()->userinfo->fullname : \Auth::user()->name }}
                    <b class="caret"></b>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#userinfo_modal" id="update"><strong>Cập nhật thông tin </strong></a>
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
    </style>
</div>