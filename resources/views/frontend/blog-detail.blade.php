@include('frontend.include.header')
    <div class="page-header section-start blog-header">
        <h1>Blog</h1>
        
    </div>
    <div class="container">
        <div class="blog-detail blog-content section-start ">
            <p class="head-date">{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
            <div class="blog-post section-start">
                <div class="blog-post-title">
                    <a>{{ $blog->title }}</a>
                </div>
                
                <div class="post-content section-start">
                    {!! $blog->editor !!}
                </div>
                <div class="review-post section-start">
                    <div class="likes ">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <p>2 likes</p>

                    </div>
                    <div class="share">
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        <p>Share</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
</body>
