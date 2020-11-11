<div class="full-width">

    <div class="container">
        <div class="section-title">
            <h2>{{ setting('portfolio.title') }}</h1>
            <span class="border"></span>
            
            <p>{!! nl2br(setting('portfolio.description')) !!}</p>
        </div>

        <div class="row">
            <div class="col text-center mt-2 mb-4" id="portfolioBtnContainer">
                <button class="btn active" data-selection="all"> Show all</button>
                <button class="btn" data-selection="ux"> UX/UI Design</button>
                <button class="btn" data-selection="photo"> Photo Editing</button>
                <button class="btn" data-selection="social"> Social Media Creative Design</button>
                <button class="btn" data-selection="logo"> Logo Design</button>
            </div>
        </div>
    </div>

    <div class="portfolio-gallery">
        @include('sections.gallery');
    </div>

</div>