<div class="footer-wrapper">
    <div class="container">
        <div class="footer-icons">
            <a href="{{ setting('site.instagram') }}" target="_blank">
                <img class="img-fluid pulse" src="{{ asset('storage/images/icon_Insta.svg') }}" 
                    alt="Instagram" loading="lazy" title="Instagram">
            </a>
            <a href="{{ setting('site.linkedin') }}" target="_blank">
                <img class="img-fluid pulse" src="{{ asset('storage/images/icon_Linkedin_.svg') }}" 
                    alt="LinkedIn" loading="lazy" title="LinkedIn">
            </a>
            <a href="mailto:{{ setting('site.email') }}">
                <img class="img-fluid pulse" src="{{ asset('storage/images/icon_envelope.svg') }}" 
                    alt="Email" loading="lazy" title="Email">
            </a>
            <a href="{{ setting('site.behance') }}" target="_blank">
                <img class="img-fluid pulse" src="{{ asset('storage/images/icon_behance_.svg') }}" 
                    alt="Behance" loading="lazy" title="Béhance">
            </a>
        </div>
        <div class="footer-info row justify-content-between">
            <div class="designed">
                <p>Website designed by</p><a href="mailto:{{ setting('site.email') }}">SeiyraDesign</a>
            </div>
            <div class="developed">
                <p>Website developed by</p><a href="https://developman.tech" target="_blank">Developman</a>
            </div>
        </div>
    </div>
</div>