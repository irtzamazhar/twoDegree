@include('frontend.include.header')
    <div class="page-header section-start faq-header">
        <h1>FAQ</h1>

    </div>

    <div class="container">
        <div class="faq-page section-start">
            <div id="accordion">
                @if(count($faqs) > 0)
                @php $i = 1 @endphp
                @foreach($faqs as $faq)
                        <h4 class="accordion-toggle<?= $i ?>">{{ $faq->faq_title }}</h4>
                        <div class="accordion-content<?= $i ?>">
                            <p>{!! $faq->faq_content !!}</p>
                        </div>
                @php $i++ @endphp
                @endforeach
                @else
                    <h2>No FAQ Yet.</h2>
                @endif
            </div>
        </div>

    </div>

@include('frontend.include.footer')

    <script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#accordion h4').click(function() {
                $(this).toggleClass('on');
                $(this).next().slideToggle('1000');
            });
        });
    </script>
</body>
