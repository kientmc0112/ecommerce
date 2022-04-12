@extends('client.layouts.main')
@section('content')
    @include('client.layouts.slider')

    @include('client.layouts.bannerTop')

    <div class="electro-product-wrapper wrapper-padding pt-85 pb-75 gray-bg-7">
        <div class="container">
            <div class="section-title-4 text-center mb-45">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="custom-row-2">
                @foreach ($newProducts as $newProduct)
                    <div class="custom-col-style-2 custom-col-4">
                        <div class="product-wrapper product-border mb-24 border">
                            <div class="product-img-3 product-img-hanicraft mb-0">
                                <a href="{{ route('products.show', $newProduct->slug) }}">
                                    <img src="{{ asset($newProduct->image) }}" alt="" style="width: 100%">
                                </a>
                                @if (isset($newProduct->discount) && $newProduct->discount > 0)
                                    <span class="new bg-danger">sell</span>
                                @endif
                                {{-- <div class="product-action-right">
                                    <a class="animate-right" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                        <i class="pe-7s-look"></i>
                                    </a>
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                    <a class="animate-left" title="Wishlist" href="#">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <div class="product-content-4 text-center">
                                <h4 style="height: 50px; overflow: hidden; font-size: 19px"><a href="{{ route('products.show', $newProduct->slug) }}">{{ $newProduct->name }}</a></h4>
                                {{-- <span style="height: 20px; overflow: hidden">{{ $newProduct->category->name }}</span> --}}
                                <div class="d-flex justify-content-center align-items-center">
                                    <h5 class="mr-2">{{ number_format($newProduct->sale_price, 0, ',', '.') ?? number_format($newProduct->price, 0, ',', '.') }}đ</h5>
                                    @if (isset($newProduct->discount) && $newProduct->discount > 0)
                                        <span style="text-decoration: line-through">{{ number_format($newProduct->price, 0, ',', '.') }}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('client.layouts.bannerBot')

    <div class="best-selling-area pb-95 gray-bg-7">
        <div class="section-title-4 text-center mb-60">
            <h2>Giảm giá</h2>
        </div>
        <div class="best-selling-product">
            <div class="product-area-2 wrapper-padding pb-7 gray-bg-7">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($saleProducts as $saleProduct)
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-wrapper product-wrapper-border mb-30">
                                    <div class="product-img-5">
                                        <a href="{{ route('products.show', $saleProduct->slug) }}">
                                            <img src="{{ asset($saleProduct->image) }}" alt="" style="width: 100%">
                                        </a>
                                    </div>
                                    <div class="product-content-7 d-flex flex-column justify-content-center">
                                        <h4 style="height: 50px; overflow: hidden"><a href="{{ route('products.show', $saleProduct->slug) }}">{{ $saleProduct->name }}</a></h4>
                                        <span style="text-decoration: line-through">{{ number_format($newProduct->price, 0, ',', '.') }}đ</span>
                                        <h5>{{ number_format($newProduct->sale_price, 0, ',', '.') }}đ</h5>
                                        {{-- <div class="product-action-electro">
                                            <a class="animate-top" title="Add To Cart" href="#">
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            <a class="animate-left" title="Wishlist" href="#">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            <a class="animate-right" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                                <i class="pe-7s-repeat"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection