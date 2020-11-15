    @include('layouts.layout')

    <body>

        <h1 style="display:none;">{{ setting('site.title') }}</h1>

        <div id="section-container">
            <section id="header" data-page="0" data-anchor="#header">
                @include('sections.header')
            </section>
            <section id="welcome" data-page="1" data-anchor="#welcome">
                @include('sections.welcome')
            </section>
            <section id="services" data-page="2" data-anchor="#services">
                @include('sections.services')
            </section>
            <section id="portfolio" data-page="3" data-anchor="#portfolio">
                @include('sections.portfolio')
            </section>
            <section id="contact" data-page="4" data-anchor="#contact">
                @include('sections.contact')
            </section>
        </div>
        
        <a href="javascript:void(0)" id="btnPrev">
            <img class="img-fluid" src="{{ asset('storage/images/jumprefup.svg') }}"
                alt="Previous page" title="Previous page" ALIGN=RIGHT>
        </a>

        <a href="javascript:void(0)" id="btnNext">
            <img class="img-fluid" src="{{ asset('storage/images/jumprefdown.svg') }}"
                alt="Next page" title="Next page" ALIGN=RIGHT>
        </a>

    </body>
</html>