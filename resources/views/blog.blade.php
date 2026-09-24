@php

$pageTitle = $pageTitle ?? 'Blog – Aesort';

$currentPage = $currentPage ?? 'blog';

@endphp

@include('include.header')

<!-- Page Header Start -->

<div class="page-header parallaxie">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <!-- Page Header Box Start -->

                <div class="page-header-box">

                    <h1 class="text-anime">Our Blog</h1>

                    <nav class="wow fadeInUp" data-wow-delay="0.25s">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-separator">/</li>



                            <li class="breadcrumb-item active" aria-current="page">Blog</li>

                        </ol>

                    </nav>

                </div>

                <!-- Page Header Box End -->

            </div>

        </div>

    </div>

</div>

<!-- Page Header End -->



<!-- Blog Archive Page Start -->

<div class="page-blog-archive">

    <div class="container">

        <div class="row">

        @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">

                <!-- Blog Item Start -->

                <div class="blog-item wow fadeInUp" data-wow-delay="0.25s">

                    <div class="post-featured-image">

                        <figure class="image-anime">

                            <img src="{{ asset('uploads/blog-images/' . $blog->image) }}" alt="{{ $blog->title }}">

                        </figure>

                    </div>



                    <div class="post-item-body">

                        <h2><a href="{{ route('blog.detail', $blog->id ) }}">{{ $blog->title }}</a></h2>

                        <div class="post-meta">

                            <ul>

                                <li><a href="{{ route('blog.detail', $blog->id ) }}"><i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('d M Y') }}</a></li>

                                <li><a href="{{ route('blog.detail', $blog->id ) }}"><i class="fa-solid fa-tag"></i> Solar Panel</a></li>

                            </ul>

                        </div>



                        <div class="btn-readmore">

                            <a href="{{ route('blog.detail', $blog->id ) }}" class="btn-default">Read More</a>

                        </div>

                    </div>

                </div>

                <!-- Blog Item End -->

            </div>
            @endforeach

        </div>





    </div>

</div>

<!-- Blog Archive Page End -->



<!-- Footer Ticker Start -->

<div class="footer-ticker">

    <div class="scrolling-ticker">

        <div class="scrolling-ticker-box">

            <div class="scrolling-content">

                <span>Optimize Your Energy Usage</span>

                <span>Maximize Commercial Savings</span>

                <span>Powering a Greener Future</span>

                <span>Smart Energy, Smart Business</span>

                <span>Reliable 24×7 Monitoring</span>



            </div>



            <div class="scrolling-content">

                <span>Optimize Your Energy Usage</span>

                <span>Maximize Commercial Savings</span>

                <span>Powering a Greener Future</span>

                <span>Smart Energy, Smart Business</span>

                <span>Reliable 24×7 Monitoring</span>



            </div>

        </div>

    </div>

</div>

<!-- Footer Ticker End -->

@include('include.footer')