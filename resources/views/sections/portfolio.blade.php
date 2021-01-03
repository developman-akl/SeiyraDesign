<div class="full-width">

    <div class="container">
        <div class="section-title">
            <h2>{{ setting('portfolio.title') }}</h2>
            <span class="border"></span>
            
            <p>{!! nl2br(setting('portfolio.description')) !!}</p>
        </div>

        <div class="row">
            <div class="col text-center mt-2 mb-4" id="portfolioBtnContainer">
                <button id="btn-show-all" class="btn active" data-selection="all"> Show all</button>
                <button id="btn-ux" class="btn" data-selection="ux"> UX/UI Design</button>
                <button id="btn-photo" class="btn" data-selection="photo"> Photo Editing</button>
                <button id="btn-social" class="btn" data-selection="social"> Social Media Creative Design</button>
                <button id="btn-logo" class="btn" data-selection="logo"> Logo Design</button>
            </div>
        </div>
    </div>

    <div id="portfolio-gallery" class="portfolio-gallery"> GALLERY IS LOADING PLEASE WAIT... </div>

</div>