<header>
    <div class="header-top-wrapper-2 border-bottom-2">
        <div class="header-info-wrapper pl-200 pr-200">
            <div class="header-contact-info header-contact-info2">
                <ul>
                    <li><i class="pe-7s-call"></i> {{ $system->phone }}</li>
                    <li><i class="pe-7s-mail"></i> {{ $system->email }}</li>
                </ul>
            </div>
            {{-- <div class="electronics-login-register">
                <ul>
                    <li><a href="#"><i class="pe-7s-users"></i>My Account</a></li>
                    <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="pe-7s-repeat"></i>Compare</a></li>
                    <li><a href="wishlist.html"><i class="pe-7s-like"></i>Wishlist</a></li>
                    <li><a href="#"><i class="pe-7s-flag"></i>US</a></li>
                    <li><a class="border-none" href="#"><span>$</span>USD</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
    <div class="header-bottom ptb-20 clearfix">
        <div class="header-bottom-wrapper pr-200 pl-200">
            <div class="logo-3">
                <a href="index.html">
                    <img src="assets/img/logo/logo-3.png" alt="">
                </a>
            </div>
            <div class="categories-search-wrapper categories-search-wrapper2">
                <div class="categories-wrapper" style="margin: 0; padding: 0; border: none">
                    <form action="{{ route('home') }}" method="GET">
                        <input placeholder="Nhập từ khóa tìm kiếm ..." name="keyword" type="text">
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <div class="header-cart-3" style="margin-top: 0">
                <a href="#" style="visibility: hidden">
                    <i class="ti-shopping-cart"></i>My Cart
                    <span>02</span>
                </a>
                {{-- <ul class="cart-dropdown">
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h5><a href="#"> Bits Headphone</a></h5>
                            <h6><a href="#">Black</a></h6>
                            <span>$80.00 x 1</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#"><i class="ti-trash"></i></a>
                        </div>
                    </li>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h5><a href="#"> Bits Headphone</a></h5>
                            <h6><a href="#">Black</a></h6>
                            <span>$80.00 x 1</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#"><i class="ti-trash"></i></a>
                        </div>
                    </li>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="assets/img/cart/3.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h5><a href="#"> Bits Headphone</a></h5>
                            <h6><a href="#">Black</a></h6>
                            <span>$80.00 x 1</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#"><i class="ti-trash"></i></a>
                        </div>
                    </li>
                    <li class="cart-space">
                        <div class="cart-sub">
                            <h4>Subtotal</h4>
                        </div>
                        <div class="cart-price">
                            <h4>$240.00</h4>
                        </div>
                    </li>
                    <li class="cart-btn-wrapper">
                        <a class="cart-btn btn-hover" href="#">view cart</a>
                        <a class="cart-btn btn-hover" href="#">checkout</a>
                    </li>
                </ul> --}}
            </div>
            <div class="mobile-menu-area mobile-menu-none-block electro-2-menu">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow" style="height: unset">
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="categori-menu-wrapper2 clearfix">
    <div class="pl-200 pr-200">
        <div class="categori-style-2">
            <div class="category-heading-2">
                <h3>Danh mục sản phẩm</h3>
                <div class="category-menu-list" style="{{ Route::currentRouteName() === 'home' && count(Request::all()) === 0 ? '' : 'display: none' }}">
                    <ul>
                        {{-- <li>
                            <a href="#"><img alt="" src="assets/img/icon-img/15.png">Computer & Laptops <i class="pe-7s-angle-right"></i></a>
                            <div class="category-menu-dropdown">
                                <div class="category-dropdown-style category-common4 mb-40">
                                    <h4 class="categories-subtitle"> Desktop</h4>
                                </div>
                                <div class="category-dropdown-style category-common4 mb-40">
                                    <h4 class="categories-subtitle"> Laptop</h4>
                                    <ul>
                                        <li><a href="#">HP</a></li>
                                        <li><a href="#">lenovo</a></li>
                                        <li><a href="#"> vivo</a></li>
                                        <li><a href="#">   Mack Book Air</a></li>
                                        <li><a href="#"> Mack Book Pro</a></li>
                                        <li><a href="#"> LG</a></li>
                                        <li><a href="#"> Others Brand</a></li>
                                    </ul>
                                </div>
                                <div class="category-dropdown-style category-common4 mb-40">
                                    <h4 class="categories-subtitle">Others</h4>
                                    <ul>
                                        <li><a href="#">Monitor</a></li>
                                        <li><a href="#">Mouse</a></li>
                                        <li><a href="#">Keybord</a></li>
                                        <li><a href="#">Speaker</a></li>
                                        <li><a href="#">Joy Stick</a></li>
                                        <li><a href="#">Wireless Speaker</a></li>
                                        <li><a href="#">Software</a></li>
                                    </ul>
                                </div>
                                <div class="category-dropdown-style category-common4 mb-40">
                                    <h4 class="categories-subtitle">Accessories</h4>
                                    <ul class="border-none">
                                        <li><a href="#">Monitor</a></li>
                                        <li><a href="#">Mouse</a></li>
                                        <li><a href="#">Keybord</a></li>
                                        <li><a href="#">Speaker</a></li>
                                        <li><a href="#">Joy Stick</a></li>
                                        <li><a href="#">Wireless Speaker</a></li>
                                        <li><a href="#">Software</a></li>
                                    </ul>
                                </div>
                                <div class="mega-banner-img">
                                    <a href="single-product.html">
                                        <img src="assets/img/banner/18.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </li> --}}
                        @foreach ($categoryHeaders as $categoryHeader)
                            <li>
                                <a href="{{ route('categories.show', $categoryHeader->id) }}">
                                    {{ $categoryHeader->name }}
                                    @if (count($categoryHeader->childs) > 0)
                                        <i class="pe-7s-angle-right"></i>
                                    @endif
                                </a>
                                @if (count($categoryHeader->childs) > 0)
                                    <div class="category-menu-dropdown" style="width: 200px; padding: 15px">
                                        <div class="category-dropdown-style category-common4 w-100 p-0">
                                            <ul>
                                                @foreach ($categoryHeader->childs as $childCategoryHeader)
                                                    <li><a href="{{ route('categories.show', $childCategoryHeader->id) }}">{{ $childCategoryHeader->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-style-4 menu-hover" style="padding-left: 20%">
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>