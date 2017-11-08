@include('frontend.include.header')
    <div class="page-header section-start blog-header">
        <h1>Blog</h1>

    </div>

    <div class="container">
        <div class="content-page blog-content section-start">
            @if(count($blogs) > 0)
                @foreach($blogs as $blog)
            <div class="blog-post section-start">
                <div class="blog-post-title">

                    <h2><a href="{{ url('blog-detail/'.$blog->id) }}">{{ $blog->title }}</a></h2>

                </div>
                <div class="date">
                    <p>{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
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
                @endforeach
            @else
                <h2>No Post Yet.</h2>
            @endif

        </div>
    </div>
@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
</body>
