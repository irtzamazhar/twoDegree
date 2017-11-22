@include('frontend.include.header')
    @foreach($siteBanner as $image)
    <div class="page-header section-start blog-header2" style="background-image: url( {{ url('public/images/' . $image['banner_image'])}} );">
        <h1>Blog</h1>
        
    </div>
    @endforeach
    <div class="container">
        @foreach($siteBanner as $image)
            <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
        @endforeach
        <div class="blog-detail blog-content section-start ">
            @foreach ($blogss as $blog)
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
            @endforeach
        </div>

    </div>
@include('frontend.include.footer')

<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "../storage/app/public/images/" + image ;
    console.log(addres);
    $(".blog-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
