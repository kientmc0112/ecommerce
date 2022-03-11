<div class="banner-area wrapper-padding gray-bg-7 pt-60">
    <div class="container-fluid">
        <div class="row">
            @foreach ($topBanners as $banner)
                <div class="col-lg-4">
                    <div class="banner-wrapper-4 mb-30">
                        <a href="{{ $banner->link }}"><img src="{{ asset($banner->image_url) }}" alt="" style="height: 280px; width: 100%; object-fit: cover"></a>
                        <div class="banner-content4-style1">
                            <h4>{{ $banner->title }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>