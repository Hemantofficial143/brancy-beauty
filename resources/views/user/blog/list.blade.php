@extends('user.layouts.auth')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1 mb-10">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>
    </nav>

    <!--== Start Blog Area Wrapper ==-->
    <section class="section-space pt-0">
        <div class="container">
            <div class="row justify-content-between flex-xl-row-reverse">
                <div class="col-xl-12">
                    <div class="row">
                        @if(!empty($blogs->all()))
                            @foreach($blogs as $blog)

                                <div class="col-sm-4 col-lg-3 col-xl-4 mb-8">
                                    <!--== Start Blog Item ==-->
                                    <div class="post-item">
                                        <a href="blog-details.html" class="thumb">
                                            <img src="{{$blog->image_path}}" width="370" height="320" alt="Image-HasTech">
                                        </a>
                                        <div class="content">
                                            @if(!empty($blog->tags_array))
                                                @foreach($blog->tags_array as $tag)
                                                    <a class="post-category mt-1">{{$tag}}</a>
                                                @endforeach
                                            @endif
                                            <h4 class="title"><a href="blog-details.html">{{$blog->title}}.</a></h4>
                                            <ul class="meta">
{{--                                                <li class="author-info"><span>By:</span> <a href="blog.html">Tomas De Momen</a></li>--}}
                                                <li class="post-date">February 13, 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--== End Blog Item ==-->
                                </div>
                            @endforeach
                        @else
                            No Blogs
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
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
