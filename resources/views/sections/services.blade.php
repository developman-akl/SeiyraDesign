<div class="container full-width">

    <div class="section-title">
        <h2>{{ setting('services.title') }}</h2>
        <span class="border"></span>
        
        <p class="">{!! nl2br(setting('services.description')) !!}</p>
    </div>

    <div class="service-images row">
        <div id="service-ux" class="column">
            <img src="{{ asset('storage/images/service1.png') }}" alt="UX/UI Design" >
            <h2>UX/UI Design</h2>
        </div>
        <div id="service-photo" class="column">
            <img src="{{ asset('storage/images/service2.png') }}" alt="Photo Editing" >
            <h2>Photo Editing</h2>
        </div>
        <div id="service-social" class="column">
            <img src="{{ asset('storage/images/service3.png') }}" alt="Social Media Creative Design">
            <h2>Social Media Creative Design</h2>
        </div>
        <div id="service-logo" class="column">
            <img src="{{ asset('storage/images/service4.png') }}" alt="Logo Design" >
            <h2>Logo Design</h2>
        </div>
    </div>

</div>