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

        @include('sections.footer')
    </div>

    <input type="button" id="btnPrev" value="Previous">
    <input type="button" id="btnNext" value="Next">

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
