@include('layouts.layout')

<body id="main-scrollbar">

    @include('sections.header')

    <section>
        @include('sections.welcome')
    </section>
    <section id="services">
        @include('sections.services')
    </section>
    <section id="portfolio">
        @include('sections.portfolio')
    </section>
    <section id="contact">
        @include('sections.contact')
    </section>

    @include('sections.footer')

    <script src="{{ mix('js/app.js') }}"></script>


</body>

</html>
