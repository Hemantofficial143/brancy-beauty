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
                            <li class="breadcrumb-item active text-dark" aria-current="page">Product Detail</li>
                        </ol>
                        <h2 class="page-header-title">Product Detail</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing Single
                        Product</h5>
                </div>
            </div>
        </div>
    </section>


    <section class="section-space">
        <div class="container">
            <div class="row product-details">
                <div class="col-lg-6">
                    <div class="product-details-thumb">
                        <img src="{{$product->images[0]->image_path}}" width="570" height="693" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h5 class="product-details-collection">{{$product->category->name}}</h5>
                        <h3 class="product-details-title">{{$product->title}}</h3>
                        <div class="product-details-review mb-7">
                            <div class="product-review-icon">
{{--                                <i class="fa fa-star-o"></i>--}}
{{--                                <i class="fa fa-star-o"></i>--}}
{{--                                <i class="fa fa-star-o"></i>--}}
{{--                                <i class="fa fa-star-o"></i>--}}
{{--                                <i class="fa fa-star-half-o"></i>--}}
                            </div>
                            <button type="button" class="product-review-show">150 reviews</button>
                        </div>
                        <div class="product-details-pro-qty">
                            <div class="pro-qty">
                                <input type="text" title="Quantity" value="01">
                            </div>
                        </div>
                        <div class="product-details-action">
                            @if($product->price == $product->mrp)
                                <h4 class="price">{{$baseHelper->formatePrice($product->price)}}</h4>
                            @else
                                <h4 class="price">{{$baseHelper->formatePrice($product->price)}}</h4>
                                <h6 style="text-decoration: line-through">{{$baseHelper->formatePrice($product->mrp)}}</h6>
                            @endif

                            <div class="product-details-cart-wishlist">
                                <button type="button" class="btn-wishlist" data-bs-toggle="modal"
                                        data-bs-target="#action-WishlistModal"><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#action-CartAddModal">Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="nav product-details-nav" id="product-details-nav-tab" role="tablist">
                        <button class="nav-link active" id="specification-tab" data-bs-toggle="tab"
                                data-bs-target="#specification" type="button" role="tab" aria-controls="specification"
                                aria-selected="false">Specification
                        </button>
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                type="button" role="tab" aria-controls="review" aria-selected="true">Review
                        </button>
                    </div>
                    <div class="tab-content" id="product-details-nav-tabContent">
                        <div class="tab-pane fade show active" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                            {!! $product->description !!}
                        </div>


                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment1.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra
                                    amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis.
                                    Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item product-review-reply">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment2.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra
                                    amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis.
                                    Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item mb-0">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment3.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra
                                    amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis.
                                    Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
