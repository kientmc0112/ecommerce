@foreach ($botBanners as $banner)
    <div class="banner-area wrapper-padding pt-15 pb-95 gray-bg-7">
        <div class="container">
            <div class="electro-fexible-banner bg-img" style="background-image: url('{{ asset($banner->image_url) }}')">
                <div class="fexible-content fexible-content-2">
                    <h3>{{ $banner->title }}</h3>
                    <p>{{ $banner->content }}</p>
                    @if (isset($banner->link))
                        <a class="btn-hover flexible-btn" href="{{ $banner->link }}">Mua ngay</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach