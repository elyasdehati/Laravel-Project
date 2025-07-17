@extends('home.home_master')
@section('home')


  <div class="breadcrumb-wrapper light-bg">
    <div class="container">

      <div class="breadcrumb-content">
        <h1 class="breadcrumb-title pb-0">Blog</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}assets/images/blog/right-arrow.svg" alt="right-arrow"></li>
                <li aria-current="page">Blog</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End breadcrumb -->

  <div class="lonyo-section-padding9 overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            @foreach ($post as $item)
                
          <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-blog-thumb">
              <img src="{{ asset($item->image) }}" alt="">
            </div>
            <div class="lonyo-blog-meta">
              <ul>
                <li>
                  <a href="single-blog.html"><img src="{{ asset('frontend/assets/images/blog/date.svg') }}" alt="">{{ $item->created_at->format('M D Y') }}</a>
                </li>
              </ul>
            </div>
            <div class="lonyo-blog-content">
              <h2><a href="single-blog.html">{{ $item->post_title }}</a></h2>
              <p>{!! Str::limit($item->long_desc, 200, '...') !!}</p>
            </div>
            <div class="lonyo-blog-btn">
              <a href="single-blog.html" class="lonyo-default-btn blog-btn">continue reading</a>
            </div>
          </div>

          @endforeach
          
        </div>
        <div class="col-lg-4">
          <div class="lonyo-blog-sidebar" data-aos="fade-left" data-aos-duration="700">
            <div class="lonyo-blog-widgets">
              <form action="#">
                <div class="lonyo-search-box">
                  <input type="search" placeholder="Type keyword here">
                  <button id="lonyo-search-btn" type="button"><i class="ri-search-line"></i></button>
                </div>
              </form>
            </div>
            <div class="lonyo-blog-widgets">
              <h4>Categories:</h4>
              <div class="lonyo-blog-categorie">
                <ul>
                    @foreach ($blogcat as $blog)

                        <li><a href="single-blog.html">{{ $blog->category_name }} <span>({{ $blog->posts_count }})</span></a></li>

                    @endforeach

                </ul>
              </div>
            </div>
            <div class="lonyo-blog-widgets">
              <h4>Recent Posts</h4>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="assets/images/blog/b4.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="assets/images/blog/date.svg" alt="">June 15, 2025</li>
                  </ul>
                  <div>
                    <h4>7 businesses for easy money</h4>
                  </div>
                </div>
              </a>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="assets/images/blog/b5.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="assets/images/blog/date.svg" alt="">June 12, 2025</li>
                  </ul>
                  <div>
                    <h4>10 Finance apps for you to use</h4>
                  </div>
                </div>
              </a>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="assets/images/blog/b6.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="assets/images/blog/date.svg" alt="">June 08, 2025</li>
                  </ul>
                  <div>
                    <h4>How to create a stock market</h4>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end blog -->
  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
  </div>


  @include('home.homelayout.apps')

  <!-- end cta -->

@endsection