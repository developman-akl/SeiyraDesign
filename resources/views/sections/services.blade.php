<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('services.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('services.description') }}</p>
    </div>

    <div class="service-images row">
        {{-- <div class="image-wrapper d-flex flex-row justify-content-stretch"> --}}
            <div class="column">
                <img class="" src="{{ asset('storage/images/service1.png') }}" alt="UX/UI Design" loading="lazy" ALIGN=CENTER>
                <h2>UX/UI Design</h2>
            </div>
            <div class="column">
                <img class="" src="{{ asset('storage/images/service2.png') }}" alt="Photo Editing" loading="lazy" ALIGN=CENTER>
                <h2>Photo Editing</h2>
            </div>
            <div class="column">
                <img class="" src="{{ asset('storage/images/service3.png') }}" alt="Social Media Creative Design" loading="lazy" ALIGN=CENTER>
                <h2>Social Media Creative Design</h2>
            </div>
            <div class="column">
                <img class="" src="{{ asset('storage/images/service4.png') }}" alt="Logo Design" loading="lazy" ALIGN=CENTER>
                <h2>Logo Design</h2>
            </div>
        </div>
    {{-- </div> --}}
</div>