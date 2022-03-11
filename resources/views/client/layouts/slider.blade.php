<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach ($sliders as $slider)
            <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url('{{ asset($slider->image_url) }}')">
                <div class="container">
                    <div class="slider-content-4 fadeinup-animated">
                        <h2 class="animated">{{ $slider->title }}</h2>
                        <h4 class="animated">{{ $slider->content }}</h4>
                        @if (isset($slider->link))
                            <a class="electro-slider-btn btn-hover animated" href="{{ $slider->link }}">Mua ngay</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>