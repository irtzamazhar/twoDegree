<footer>
        <div class="container">
            <div class="footer-nav section-start">
                <ul>
                    @if(count($pages) > 0)
                        @foreach($pages as $page)
                            <li><a href="{{ url($page->page_url) }}">{{ $page->page_title }}</a></li>
                        @endforeach
                    @else
                        <h2>No Page Yet.</h2>
                    @endif
                </ul>
            </div>
            <div class="footer-social section-start">
                <a href="https://www.facebook.com/TwoDegreesApp/" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/TwoDegreesApp" class="twt"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="http://instagram.com/twodegreesapp" class="insta"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/channel/UCCuNL09zjWr7wFVjG85WfZA" class="you-tube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            </div>
        </div>
</footer>