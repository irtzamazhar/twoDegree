@include('frontend.include.header')
    @foreach($siteBanner as $image)
    <div class="page-header section-start blog-header2">
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
                        <div id="fb-root"></div>
                        <script>
                            window.fbAsyncInit = function() {
                              FB.init({
                                appId            : '128704691158646',
                                autoLogAppEvents : true,
                                xfbml            : true,
                                version          : 'v2.11'
                              });
                            };

                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = 'https://connect.facebook.net/en_US/sdk.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <!-- Your like button code -->
                        <div class="fb-like" 
                             data-href="http://localhost/twodegree/blog-detail/{{ $blog->id }}"
                             data-layout="button" 
                             data-action="like" 
                             data-size="small" 
                             data-show-faces="false" 
                            data-share="true">
                        </div>

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
    $(".blog-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
