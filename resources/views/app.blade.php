    @include('layouts.layout')

    <body>

        <h1 style="display:none;">{{ setting('site.title') }}</h1>

        <div id="section-container">
            <section id="header" data-id="0">
                @include('sections.header')
            </section>
            <section id="welcome" data-id="1">
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

    </body>
</html>