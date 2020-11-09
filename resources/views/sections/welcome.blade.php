@include('sections.nav')

<div class="container full-width">

    <div class="section-title">
        <h2>{{ setting('welcome.title') }}</h1>
        <span class="border"></span>
        
        <p>{!! nl2br(setting('welcome.description')) !!}</p>
    </div>

    <img src="{{ asset('storage/images/devices.png') }}" class="devices" alt="Responsive Devices Demo Image" />
</div>
