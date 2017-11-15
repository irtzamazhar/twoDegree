@include('frontend.include.header')

    <div class="page-header app-header2 section-start" style="background-image: url( {{ url('public/images/' . $page->page_image)}} };">
    <!--<img src="{{ asset('storage/app/public/images/' . $page->page_image) }}" style="width: 100%;">-->
        <h1>{{ $page->page_title }}</h1>
        
    </div>
    <div class="download-section section-start">
        <div class="container">
            <div class="content-page section-start">
                <div class="terms-page section-start">
                    <div style="display: none;" id="page-image">{{ $page->page_image }}</div>
                    {!! $page->page_content !!}                   
                </div>
            </div>
        </div>

    </div>

@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript">
        var image = $('#page-image').text();
        var addres = "../storage/app/public/images/" + image ;
        $(".app-header2").css('background-image', 'url(' + addres + ')');
    </script>
</body>
