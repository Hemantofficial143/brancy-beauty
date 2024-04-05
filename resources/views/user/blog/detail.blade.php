@inject('baseHelper','\App\Helpers\BaseHelper')
@extends('user.layouts.auth')
@section('content')

    <!--== Start Page Header Area Wrapper ==-->
    <nav aria-label="breadcrumb" class="breadcrumb-style1">
        <div class="container">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('blog.list') }}">Blogs</a></li>
                <li class="breadcrumb-item active">{{ $blog->title }}</li>
            </ol>
        </div>
    </nav>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Blog Detail Area Wrapper ==-->
    <section class="section-space pb-0">
        <div class="container">
            <div class="blog-detail">
                <h3 class="blog-detail-title">{{$blog->title}}</h3>
                <div class="blog-detail-category">
                    @if(!empty($blog->tags_array))
                        @foreach($blog->tags_array as $tag)
                            <a class="category mt-1">{{$tag}}</a>
                        @endforeach
                    @endif
                </div>
                @if(!empty($blog->image_path))
                    <img class="blog-detail-img mb-7 mb-lg-10" src="{{$blog->image_path}}" width="1170" height="1012"
                         alt="Image">
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Blog Detail Area Wrapper ==-->

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
