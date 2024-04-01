@extends('user.layouts.auth')
@section('content')

    <!--== Start Hero Area Wrapper ==-->
    <section class="hero-two-slider-area position-relative">
        <div class="swiper hero-two-slider-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide hero-two-slide-item">
                    <div class="container">
                        <div class="row align-items-center position-relative">
                            <div class="col-12 col-md-6">
                                <div class="hero-two-slide-content">
                                    <div class="hero-two-slide-text-img"><img
                                            src="/assets/images/slider/text-light.webp" width="427" height="232"
                                            alt="Image"></div>
                                    <h2 class="hero-two-slide-title">ANTI AGEING</h2>
                                    <p class="hero-two-slide-desc">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit ut aliquam, purus sit amet luctus venenatis.</p>
                                    <div class="hero-two-slide-meta">
                                        <a class="btn btn-border-primary" href="product.html">BUY NOW</a>
                                        <a class="ht-popup-video" data-fancybox data-type="iframe"
                                           href="https://player.vimeo.com/video/172601404?autoplay=1">
                                            <i class="fa fa-play icon"></i>
                                            <span>Play Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="hero-two-slide-thumb">
                                    <img src="https://htmldemo.net/brancy/brancy/assets/images/slider/slider3.webp"
                                         width="690" height="690" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide hero-two-slide-item">
                    <div class="container">
                        <div class="row align-items-center position-relative">
                            <div class="col-12 col-md-6">
                                <div class="hero-two-slide-content">
                                    <div class="hero-two-slide-text-img"><img src="assets/images/slider/text-light.webp"
                                                                              width="427" height="232" alt="Image">
                                    </div>
                                    <h2 class="hero-two-slide-title">CLEAN FRESH</h2>
                                    <p class="hero-two-slide-desc">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit ut aliquam, purus sit amet luctus venenatis.</p>
                                    <div class="hero-two-slide-meta">
                                        <a class="btn btn-border-primary" href="product.html">BUY NOW</a>
                                        <a class="ht-popup-video" data-fancybox data-type="iframe"
                                           href="https://player.vimeo.com/video/172601404?autoplay=1">
                                            <i class="fa fa-play icon"></i>
                                            <span>Play Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="hero-two-slide-thumb">
                                    <img src="assets/images/slider/slider4.webp" width="690" height="690" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== Add Pagination ==-->
            <div class="hero-two-slider-pagination"></div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->]

    @php
        $saleCategory = [
            [
                'url' => '#',
                'image' => 'https://htmldemo.net/brancy/brancy/assets/images/shop/banner/4.webp',
            ],[
                'image' => 'https://htmldemo.net/brancy/brancy/assets/images/shop/banner/4.webp',
                'url' => '#',
            ],[
                'image' => 'https://htmldemo.net/brancy/brancy/assets/images/shop/banner/4.webp',
                'url' => '#',
            ],[
                'image' => 'https://htmldemo.net/brancy/brancy/assets/images/shop/banner/4.webp',
                'url' => '#',
            ],[
                'image' => 'https://htmldemo.net/brancy/brancy/assets/images/shop/banner/4.webp',
                'url' => '#',
            ]
        ];
    @endphp
    @if(!empty($saleCategory))
        <section class="section-space">
            <div class="container">
                <div class="row">
                    @foreach($saleCategory as $category)
                        <div class="{{ count($saleCategory) % 2 == 0 ? 'col-sm-6 col-lg-6' : 'col-sm-4 col-lg-4 mt-2'}}">
                            <!--== Start Product Category Item ==-->
                            <a href="{{$category['url']}}" class="product-banner-item">
                                <img src="{{$category['image']}}"
                                     width="370" height="370" alt="Image-HasTech">
                            </a>
                            <!--== End Product Category Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!--== End Product Banner Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Best Product</h2>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit
                            amet luctus venenatis</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/1.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Readable content DX22</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/2.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Modern Eye Brush</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/4.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Voyage face cleaner</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/3.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Impulse Duffle</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Sprite Yoga Straps1</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/6.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Fusion facial cream</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="product.html" class="product-banner-item">
                <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
    </section>
    <!--== End Product Banner Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Top Sale Products</h2>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit
                            amet luctus venenatis</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                <div class="col-6 col-lg-4 mb-4 mb-sm-10">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/8.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Readable content DX22</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-10">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Voyage face cleaner</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
                <div class="col-6 col-lg-4 mb-4 mb-sm-10">
                    <!--== Start Product Item ==-->
                    <div class="product-item product-st2-item">
                        <div class="product-thumb">
                            <a class="d-block" href="product-details.html">
                                <img src="assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">new</span>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="reviews">150 reviews</div>
                            </div>
                            <h4 class="title"><a href="product-details.html">Impulse Duffle</a></h4>
                            <div class="prices">
                                <span class="price">$210.00</span>
                                <span class="price-old">300.00</span>
                            </div>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
                            <div class="product-action-bottom">
                                <button type="button" class="product-action-btn action-btn-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist"
                                        data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">
                                    <span>Add to cart</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--== End prPduct Item ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="section-space pt-0">
        <div class="container">
            <div class="swiper brand-logo-slider-container">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide brand-logo-item">
                        <!--== Start Brand Logo Item ==-->
                        <img src="assets/images/brand-logo/1.webp" width="155" height="110" alt="Image-HasTech">
                        <!--== End Brand Logo Item ==-->
                    </div>
                    <div class="swiper-slide brand-logo-item">
                        <!--== Start Brand Logo Item ==-->
                        <img src="assets/images/brand-logo/2.webp" width="241" height="110" alt="Image-HasTech">
                        <!--== End Brand Logo Item ==-->
                    </div>
                    <div class="swiper-slide brand-logo-item">
                        <!--== Start Brand Logo Item ==-->
                        <img src="assets/images/brand-logo/3.webp" width="147" height="110" alt="Image-HasTech">
                        <!--== End Brand Logo Item ==-->
                    </div>
                    <div class="swiper-slide brand-logo-item">
                        <!--== Start Brand Logo Item ==-->
                        <img src="assets/images/brand-logo/4.webp" width="196" height="110" alt="Image-HasTech">
                        <!--== End Brand Logo Item ==-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Brand Logo Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    @if(!empty($blogs))
        <section class="section-space pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Blog posts</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-n9">
                    @foreach($blogs as $blog)

                        <div class="col-sm-6 col-lg-4 mb-8">
                            <!--== Start Blog Item ==-->
                            <div class="post-item">
                                <a href="{{$blog->url}}" class="thumb">
                                    <img src="{{$blog->image_path}}" width="370" height="320" alt="Image-HasTech">
                                </a>
                                <div class="content">
                                    <h4 class="title"><a href="{{$blog->url}}">{{ $blog->title }}</a></h4>
                                    @if(!empty($blog->tags_array))
                                        @foreach($blog->tags_array as $tag)
                                            <a class="post-category mt-1">{{$tag}}</a>
                                        @endforeach
                                    @endif
{{--                                    <ul class="meta">--}}
{{--                                        <li class="author-info"><span>By:</span> <a href="blog.html">Tomas De Momen</a></li>--}}
{{--                                        <li class="post-date">February 13, 2021</li>--}}
{{--                                    </ul>--}}
                                </div>
                            </div>
                            <!--== End Blog Item ==-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--== End Blog Area Wrapper ==-->

    <!--== Start News Letter Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/bg1.webp">
                <div class="newsletter-content">
                    <div class="section-title mb-0">
                        <h2 class="title">Join with us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam.</p>
                    </div>
                </div>
                <div class="newsletter-form">
                    <form>
                        <input type="email" class="form-control" placeholder="enter your email">
                        <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--== End News Letter Area Wrapper ==-->

@endsection
