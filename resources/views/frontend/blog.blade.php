@include('frontend.include.header')
    @foreach($siteBanner as $image)
    <div class="page-header section-start blog-header2">
        <h1>Blog</h1>

    </div>
    @endforeach
        

    <div class="container">
        <div class="content-page blog-content section-start">
            @foreach($siteBanner as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
            @if(count($blogs) > 0)
                @foreach($blogs as $blog)
            <div class="blog-post section-start">
                <div class="blog-post-title">

                    <h2><a href="{{ url('blog-detail/'.$blog->slug) }}">{{ $blog->title }}</a></h2>

                </div>
                <div class="date">
                    <p>{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
                </div>
                <div class="post-content section-start">
                    {!! $blog->editor !!}
                </div>
                <div class="review-post section-start">
                    <div class="likes ">
                        <!-- Load Facebook SDK for JavaScript -->
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
                             data-href="http://localhost/twodegree/blog/{{ $blog->id }}"
                             data-layout="button" 
                             data-action="like" 
                             data-size="large" 
                             data-show-faces="false" 
                            data-share="true">
                        </div>
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

<script type="text/javascript">
    var image = $('#page-image').text();
    var addres = "storage/app/public/images/" + image ;
    $(".blog-header2").css('background-image', 'url(' + addres + ')');
</script>
</body>
