@include('layouts.layout')

<body>

    <div id="main-scrollbar">
        @include('sections.header')

        <section>
            @include('sections.welcome')
        </section>
        <section id="services" data-id="2">
            @include('sections.services')
        </section>
        <section id="portfolio" data-id="3">
            @include('sections.portfolio')
        </section>
        <section id="contact" data-id="4">
            @include('sections.contact')
        </section>
    </div>
    
    <a href="javascript:void(0)" id="btnPrev">
        <img class="img-fluid" src="{{ asset('storage/images/jumprefup.svg') }}"
            alt="Previous page" title="Previous page" loading="lazy" ALIGN=RIGHT>
    </a>
    <a href="javascript:void(0)" id="btnNext">
        <img class="img-fluid" src="{{ asset('storage/images/jumprefdown.svg') }}"
            alt="Next page" title="Next page" loading="lazy" ALIGN=RIGHT>
    </a>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>