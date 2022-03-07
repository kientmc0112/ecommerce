@extends('client.layouts.main')
@section('content')
<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-5 pr-70">
                    <img src="{{ asset($product->image) }}" alt="" style="max-height: 600px; width: 100%; object-fit: cover">
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="sidebar-active product-details-content">
                    <h3>{{ $product->name }}</h3>
                    {{-- <div class="rating-number">
                        <div class="quick-view-rating">
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star red-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                            <i class="pe-7s-star"></i>
                        </div>
                        <div class="quick-view-number">
                            <span>2 Ratting (S)</span>
                        </div>
                    </div> --}}
                    <div class="details-price">
                        <span class="mr-2">{{ number_format($product->sale_price, 0, ',', '.') ?? number_format($product->price, 0, ',', '.') }}đ</span>
                        @if (isset($product->discount) && $product->discount > 0)
                            <label style="text-decoration: line-through">{{ number_format($product->price, 0, ',', '.') }}đ</label>
                        @endif
                    </div>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmol tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim veni quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p> --}}
                    {{-- <div class="product-color-2">
                        <h4 class="details-title">Color*</h4>
                        <div class="product-color-style2">
                            <ul>
                                <li class="orange"></li>
                                <li class="blue2"></li>
                                <li class="pink"></li>
                                <li class="yellow"></li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="product-size-2">
                        <h4 class="details-title">Size*</h4>
                        <div class="product-size-style2">
                            <ul>
                                <li><a href="#">xl</a></li>
                                <li><a href="#">ml</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">sl</a></li>
                                <li><a href="#">ls</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="quickview-plus-minus">
                        <div class="cart-plus-minus">
                            <input type="text" value="{{ $product->quantity }}" name="qtybutton" class="cart-plus-minus-box">
                        </div>
                        {{-- <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="#">add to cart</a>
                        </div>
                        <div class="quickview-btn-wishlist">
                            <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                        </div> --}}
                    </div>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">Categories :</li>
                            <li><a href="#">{{ $product->category->name }}</a></li>
                        </ul>
                    </div>
                    {{-- <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Tags :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul>
                    </div>
                    <div class="product-share">
                        <ul>
                            <li class="categories-title">Share :</li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-flikr"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role=tablist>
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                    Description
                </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>Related products</h2>
        </div>
        <div class="product-style">
            <div class="related-product-active owl-carousel">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{ route('products.show', $relatedProduct->slug) }}">
                                <img src="{{ asset($relatedProduct->image) }}" alt="" style="height: 450px; width: 100%; object-fit: cover">
                            </a>
                            @if (isset($relatedProduct->discount) && $relatedProduct->discount > 0)
                                <span class="bg-danger">sell</span>
                            @endif
                            {{-- <div class="product-action">
                                <a class="animate-left" title="Wishlist" href="#">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <a class="animate-top" title="Add To Cart" href="#">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                    <i class="pe-7s-look"></i>
                                </a>
                            </div> --}}
                        </div>
                        <div class="product-content">
                            <h4><a href="{{ route('products.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a></h4>
                            <span class="mr-2">{{ number_format($relatedProduct->sale_price, 0, ',', '.') ?? number_format($relatedProduct->price, 0, ',', '.') }}đ</span>
                            @if (isset($relatedProduct->discount) && $relatedProduct->discount > 0)
                                <label style="text-decoration: line-through">{{ number_format($relatedProduct->price, 0, ',', '.') }}đ</label>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection