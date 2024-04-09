@inject('baseHelper','\App\Helpers\BaseHelper')
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
            </div>
        </div>
    </section>
    <section class="section-space">
        <div class="container">
            <div class="row justify-content-between flex-xl-row-reverse">

                <div class="col-xl-9">
                    <a class="btn btn-danger w-20 mb-2" href="{{ route('product.list') }}">Clear Filters</a>
                    <div class="row g-3 g-sm-6">

                        @if(!empty($products->all()))
                            @foreach($products as $product)
                                <div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
                                    <!--== Start Product Item ==-->
                                    <div class="product-item product-st3-item">
                                        <div class="product-thumb">
                                            <a class="d-block"
                                               href="{{ route('product.detail',['slug' => $product->slug]) }}">
                                                <img
                                                    src="{{isset($product->images[0]) ? $product->images[0]->image_path : ''}}"
                                                    width="370" height="450" alt="Image-HasTech">
                                            </a>
                                            {{--                                            <span class="flag-new">new</span>--}}
                                            <div class="product-action">
                                                <a class="product-action-btn action-btn-cart"
                                                   href="{{ route('product.detail',['slug' => $product->slug]) }}">
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
                                            <h4 class="title"><a
                                                    href="{{ route('product.detail',['slug' => $product->slug]) }}">{{$product->title}}</a>
                                            </h4>
                                            <div class="prices">
                                                <span
                                                    class="price">{{ $baseHelper->formatePrice($product->price)}}</span>
                                                <span
                                                    class="price-old">{{ $baseHelper->formatePrice($product->mrp) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--== End prPduct Item ==-->
                                </div>
                            @endforeach
                        @else
                            <p class="text-warning">No Products Found</p>
                        @endif
                        <div class="col-12">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-sidebar-widget">
                        <div class="product-widget-search">
                            <input type="search" id="search" placeholder="Search Here"
                                   value="{{ app('request')->input('q') }}">
                            <button id="searchProduct" type="submit"><i class="fa fa-search"></i></button>
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
                            <a id="rangeProduct" class="text-primary" href="javascript:void(0)">Apply</a>
                        </div>
                        <div class="product-widget">
                            <h4 class="product-widget-title">Categories</h4>
                            <ul class="product-widget-category">
                                @if(!empty($categories))
                                    @foreach($categories as $category)
                                        <li><a data-url="{{ route('product.list',['cat' => $category['id']]) }}"
                                               href="{{ route('product.list',['cat' => $category['id']]) }}">{{$category['name']}}
                                                <span>({{ $category['product_count'] }})</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
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
        let $selectedMin = "{{ $selectedMinMax['min'] }}";
        let $selectedMax = "{{ $selectedMinMax['max'] }}";
    </script>
    <script src="{{asset('assets/js/plugins/range-slider.js')}}"></script>
    <script>

        function applySearch() {
            let newSearch = {}
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            newSearch['q'] = $('#search').val();
            newSearch['min'] = document.getElementsByName('min-value').value;
            newSearch['max'] = document.getElementsByName('max-value').value;
            const queryString = Object.keys(newSearch)
                .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(newSearch[key])}`)
                .join('&');
            window.location.href = `?${queryString}`
        }

        let searchButton = $('#searchProduct')
        let rangeButton = $('#rangeProduct')
        searchButton.on('click', function () {
            applySearch();
        })
        rangeButton.on('click', function () {
            applySearch();
        })


    </script>
@endsection
