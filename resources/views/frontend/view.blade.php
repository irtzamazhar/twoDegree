@include('frontend.include.header')
<div class="page-header section-start" style="background-image: url({{ asset('public/images/'$page->page_image) }});">
        
        <h1>{{ $page->page_title }}</h1>
        
    </div>
    <div class="download-section section-start">
        <div class="container">
            {!! $page->page_content !!}
        </div>

    </div>

@include('frontend.include.footer')
    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
</body>
