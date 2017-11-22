@include('frontend.include.header')
@foreach($faqImage as $image)
    <div class="page-header section-start faq-header2" >
        <h1>FAQ</h1>

    </div>
@endforeach

    <div class="container">
        <div class="faq-page section-start">
            @foreach($faqImage as $image)
                <div style="display: none;" id="page-image">{{ $image['banner_image'] }}</div>
            @endforeach
            @if(count($faqs) > 0)

            @foreach($faqs as $faq)
                <div id="accordion">
                    <h4 class="accordion-toggle">{{ $faq->faq_title }}</h4>
                    <div class="accordion-content">
                        <p>{!! $faq->faq_content !!}</p>
                    </div>
                </div>
            @endforeach
            @else
                <h2>No FAQ Yet.</h2>
            @endif
        </div>

    </div>

@include('frontend.include.footer')

    <script type="text/javascript">
        $(document).ready(function($) {
            $('#accordion h4').click(function() {
                $(this).toggleClass('on');
                $(this).next().slideToggle('1000');
            });
        });
    </script>
    <script type="text/javascript">
        var image = $('#page-image').text();
        var addres = "storage/app/public/images/" + image ;
        console.log(addres);
        $(".faq-header2").css('background-image', 'url(' + addres + ')');
    </script>
</body>
