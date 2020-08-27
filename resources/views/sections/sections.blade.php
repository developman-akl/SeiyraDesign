@section('content')
<div class="container">
    <section id="landing">
        @include('sections.landing')
    </section>
    <section id="home">
        @include('sections.home')
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
</div>
@endsection
