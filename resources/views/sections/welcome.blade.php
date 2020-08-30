@include('sections.nav')

<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('welcome.welcome_title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('welcome.welcome_description') }}</p>
    </div>

    <img src="{{ asset('storage/images/devices.png') }}" class="devices" />
</div>
