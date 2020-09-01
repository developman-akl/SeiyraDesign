<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('services.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('services.description') }}</p>
    </div>

    <div class="service-images">
        <div class="image-wrapper">
            <a href="">
                <img class="img-fluid" src="{{ asset('storage/images/service1.png') }}" 
                    alt="UX/UI Design" loading="lazy" ALIGN=CENTER>
            </a>
            <h3>UX/UI Design</h3>
        </div>
        <div class="image-wrapper">
            <a href="">
                <img class="img-fluid" src="{{ asset('storage/images/service2.png') }}" 
                    alt="Photo Editing" loading="lazy" ALIGN=CENTER>
            </a>
            <h3>Photo Editing</h3>
        </div>
        <div class="image-wrapper">
            <a href="">
                <img class="img-fluid" src="{{ asset('storage/images/service3.png') }}" 
                    alt="Social Media Creative Design" loading="lazy" ALIGN=CENTER>
            </a>
            <h3>Social Media Creative Design</h3>
        </div>
        <div class="image-wrapper">
            <a href="">
                <img class="img-fluid" src="{{ asset('storage/images/service4.png') }}" 
                    alt="Logo Design" loading="lazy" ALIGN=CENTER>
            </a>
            <h3>Logo Design</h3>
        </div>
    </div>
</div>