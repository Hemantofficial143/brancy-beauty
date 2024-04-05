@extends('user.layouts.auth')
@section('content')
    <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="page-header-st3-content text-center text-md-start">
                        <ol class="breadcrumb justify-content-center justify-content-md-start">
                            <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Products</li>
                        </ol>
                        <h2 class="page-header-title">All Products</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing 09 Results</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="section-space">
        <div class="container">
            <div class="row justify-content-between flex-xl-row-reverse">
                <div class="col-xl-9">
                    <div class="row g-3 g-sm-6">
                        @if(!empty($products->all()))
                            @foreach($products as $product)
                                <div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
                                    <!--== Start Product Item ==-->
                                    <div class="product-item product-st3-item">
                                        <div class="product-thumb">
                                            <a class="d-block" href="{{ route('product.detail',['slug' => $product->slug]) }}">
                                                <img src="{{isset($product->images[0]) ? $product->images[0]->image_path : ''}}" width="370" height="450" alt="Image-HasTech">
                                            </a>
{{--                                            <span class="flag-new">new</span>--}}
                                            <div class="product-action">
                                                <a class="product-action-btn action-btn-cart" href="{{ route('product.detail',['slug' => $product->slug]) }}" >
                                                    <span>Details</span>
                                                </a>
                                            </div>
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
                                            <h4 class="title"><a href="{{ route('product.detail',['slug' => $product->slug]) }}">{{$product->title}}</a></h4>
                                            <div class="prices">
                                                <span class="price">$210.00</span>
                                                <span class="price-old">300.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--== End prPduct Item ==-->
                                </div>
                            @endforeach
                        @endif

                        <div class="col-12">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-sidebar-widget">
                        <div class="product-widget-search">
                            <form action="#">
                                <input type="search" placeholder="Search Here">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="product-widget">
                            <h4 class="product-widget-title">Price Filter</h4>
                            <div class="product-widget-range-slider">
                                <div class="slider-range" id="slider-range"></div>
                                <div class="slider-labels">
                                    <span id="slider-range-value1"></span>
                                    <span>—</span>
                                    <span id="slider-range-value2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="product-widget">
                            <h4 class="product-widget-title">Categories</h4>
                            <ul class="product-widget-category">
                                @if(!empty($categories))
                                    @foreach($categories as $category)
                                        <li><a data-url="{{ route('product.list',['cat' => $category['id']]) }}" href="{{ route('product.list',['cat' => $category['id']]) }}">{{$category['name']}} <span>(5)</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
{{--                        <div class="product-widget mb-0">--}}
{{--                            <h4 class="product-widget-title">Popular Tags</h4>--}}
{{--                            <ul class="product-widget-tags">--}}
{{--                                <li><a href="blog.html">Beauty</a></li>--}}
{{--                                <li><a href="blog.html">MakeupArtist</a></li>--}}
{{--                                <li><a href="blog.html">Makeup</a></li>--}}
{{--                                <li><a href="blog.html">Hair</a></li>--}}
{{--                                <li><a href="blog.html">Nails</a></li>--}}
{{--                                <li><a href="blog.html">Hairstyle</a></li>--}}
{{--                                <li><a href="blog.html">Skincare</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        let $minAmount = "{{ $amount['min'] }}";
        let $maxAmount = "{{ $amount['max'] }}";
    </script>
    <script src="{{asset('assets/js/plugins/range-slider.js')}}"></script>
@endsection
