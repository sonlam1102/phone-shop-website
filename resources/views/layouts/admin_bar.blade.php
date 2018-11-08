<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

        <li><a href="#" data-toggle="dropdown" >Giỏ hàng </a>
            <ul class="dropdown-menu">
                @if(\Auth::check() && \Auth::user()->carts->where('order_id', null)->first())
                    @foreach(\Auth::user()->carts->where('order_id', null)->first()->products as $item)
                        <li><a href="#">{{ $item->product->name."---".$item->quantity }}</a></li>
                    @endforeach
                @endif
                {{--<li><a href="#">By Price Low</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">By Price High</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">By Popularity</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">By Reviews</a></li>--}}
            </ul>
        </li>

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
</div>