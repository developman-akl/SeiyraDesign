@include('sections.nav')

<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('welcome.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('welcome.description') }}</p>
    </div>

    <img src="{{ asset('storage/images/devices.png') }}" class="devices" />
</div>
