@php

	$pageTitle = $pageTitle ?? 'Blog-detail – Aesort';

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

						<h1 class="text-anime">{{ $blog->title }}</h1>

						  <nav class="wow fadeInUp" data-wow-delay="0.25s">

                        <ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-separator">/</li>



                            <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>

                        </ol>

                    </nav>

					</div>

					<!-- Page Header Box End -->

				</div>

			</div>

		</div>

	</div>

	<!-- Page Header End -->



	<!-- Single Post Page Start -->

	<div class="page-single-post">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<!-- Post Featured Image Start -->

					<div class="post-featured-image wow fadeInUp" data-wow-delay="0.25s">

						<figure class="image-anime">

							<img src="{{ asset('uploads/blog-images/' . $blog->image) }}" alt="{{ $blog->title }}">

						</figure>

					</div>

					<!-- Post Featured Image Start -->



					<!-- Post Content Start -->

					<div class="post-content">

						<!-- Post Entry Start -->

						<div class="post-entry">
							<h2 class="text-anime">{{ $blog->title }}</h2>

							<p>{{ $blog->description }}</p>

							{!! $blog->content !!}

						</div>
					</div>
				</div>

			</div>

		</div>		

	</div>

	<div class="related-posts">

		<div class="container">

			<div class="row">

			@foreach($relatedBlogs as $blog)
				<div class="col-lg-4">

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
				</div>
				@endforeach

			</div>

		</div>

	</div>

	<!-- Related Post Section End -->

	

	<!-- Footer Ticker Start -->

	<div class="footer-ticker">

		<div class="scrolling-ticker">

            <div class="scrolling-ticker-box">

                <div class="scrolling-content">

                  <span>Optimize Your Energy Usage</span>

<span>Maximize Industrial Savings</span>

<span>Powering a Greener Future</span>

<span>Smart Energy, Smart Industry</span>

<span>Reliable 24×7 Monitoring</span>



                </div>



                <div class="scrolling-content">

       <span>Optimize Your Energy Usage</span>

<span>Maximize Industrial Savings</span>

<span>Powering a Greener Future</span>

<span>Smart Energy, Smart Industry</span>

<span>Reliable 24×7 Monitoring</span>



                </div>

            </div>

        </div>

	</div>

	<!-- Footer Ticker End -->

@include('include.footer')