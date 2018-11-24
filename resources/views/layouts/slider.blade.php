<div class="col-md-12">
    <div class="well well-lg offer-box text-center">
        Sản phẩm hiện đang khuyến mãi
    </div>
    <div class="mis-stage">
        <ol class="mis-slider">
            @foreach(\App\Model\ProductGift::get_all_gifts() as $item)
            <li class="mis-slide">
                <a href="#" class="mis-container">
                    <figure>
                        <img src="{{ $item->product->img }}" onerror="this.src='/img/product.png';">
                        <figcaption> {{ $item->product->name }} </figcaption>
                    </figure>
                </a>
            </li>
            @endforeach
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden02.jpg" alt="Pond with Lillies">--}}
                        {{--<figcaption>Pond with Lillies</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden03.jpg" alt="Hidden Pond">--}}
                        {{--<figcaption>Hidden Pond</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden04.jpg" alt="Shrine">--}}
                        {{--<figcaption>Shrine</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden05.jpg" alt="White Water Lillies">--}}
                        {{--<figcaption>White Water Lillies</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden06.jpg" alt="Garden Walkway">--}}
                        {{--<figcaption>Garden Walkway</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="mis-slide">--}}
                {{--<a href="#" class="mis-container">--}}
                    {{--<figure>--}}
                        {{--<img src="/img/garden07.jpg" alt="Lilly with Bee">--}}
                        {{--<figcaption>Lilly with Bee</figcaption>--}}
                    {{--</figure>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ol>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.mis-stage').miSlider({
            slidesOnStage: false,
            slidePosition: 'center',
            slideStart: 'mid',
            slideScaling: 150,
            offsetV: -5,
            centerV: true,
            navButtonsOpacity: 1
        });
    });
</script>