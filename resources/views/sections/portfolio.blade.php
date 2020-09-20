<div class="full-width">

    <div class="container">
        <div class="section-title">
            <h1>{{ setting('portfolio.title') }}</h1>
            <span class="border"></span>
            
            <p>{{ setting('portfolio.description') }}</p>
        </div>

        <div class="row">
            <div class="col text-center mt-4" id="portfolioBtnContainer">
                <button class="btn active" data-selection="all"> Show all</button>
                <button class="btn" data-selection="ux"> UX/UI Design</button>
                <button class="btn" data-selection="photo"> Photo Editing</button>
                <button class="btn" data-selection="social"> Social Media Creative Design</button>
                <button class="btn" data-selection="logo"> Logo Design</button>
            </div>
        </div>
    </div>
    
    <!-- Photo Grid -->
    <div class="iframe-container">
        <iframe class="responsive-iframe" name="gallery-iframe" id="gallery-iframe" src="{{url('gallery')}}" title="SeiyraDesign Portfolio Gallery" style="border:none;"></iframe>
    </div>
</div>