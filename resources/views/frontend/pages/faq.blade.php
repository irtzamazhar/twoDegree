@include('frontend.include.header')
    <div class="page-header section-start faq-header">
        <h1>FAQ</h1>

    </div>

    <div class="container">
        <div class="faq-page section-start">
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

    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#accordion').find('.accordion-toggle').click(function() {
                $('.accordion-toggle').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle2').click(function() {
                $('.accordion-toggle2').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle3').click(function() {
                $('.accordion-toggle3').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle4').click(function() {
                $('.accordion-toggle4').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle5').click(function() {
                $('.accordion-toggle5').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle6').click(function() {
                $('.accordion-toggle6').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle7').click(function() {
                $('.accordion-toggle7').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle8').click(function() {
                $('.accordion-toggle8').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle9').click(function() {
                $('.accordion-toggle9').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
            $('#accordion').find('.accordion-toggle10').click(function() {
                $('.accordion-toggle10').toggleClass('on');
                $(this).next().slideToggle('1000');
            });
        });

    </script>
</body>
