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