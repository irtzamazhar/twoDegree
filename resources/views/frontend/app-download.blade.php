@include('frontend.include.header')
    <div class="page-header section-start ">
        <img src="{{ asset('storage/app/public/images/'.$page->page_image) }}" >
        
        <h1>{{ $page->page_title }}</h1>
        
    </div>
    <div class="download-section section-start">
        <div class="container">
<!--            <p>Connect with people nearby based on mutual friends. </p>
            <div class="download-btns">
                <a href="https://itunes.apple.com/us/app/two-degrees/id905597963?mt=8"><img src="{{ asset('public/frontend/images/appStoreBadge.png') }}" /></a>
                <a href="https://play.google.com/store/apps/details?id=zoomapps.twodegrees"><img src="{{ asset('public/frontend/images/playStoreBadge.png') }}" /></a>
            </div>
            <p>Thanks for your interest in
                <a href="index.html"><img src="images/two.png" /></a> <br> Available for iPhone and Android</p>-->
            {!! $page->page_content !!}
        </div>

    </div>

@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
</body>
