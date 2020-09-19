<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('portfolio.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('portfolio.description') }}</p>
    </div>

    <div class="portfolio">
        <div class="row">
            <div class="col text-center" id="portfolioBtnContainer">
                <button class="btn active" data-selection="all"> Show all</button>
                <button class="btn" data-selection="ux"> UX/UI Design</button>
                <button class="btn" data-selection="photo"> Photo Editing</button>
                <button class="btn" data-selection="social"> Social Media Creative Design</button>
                <button class="btn" data-selection="logo"> Logo Design</button>
            </div>
        </div>

        <!-- Photo Grid -->
        <div class="row"> 
            <div class="column ux">
                <div class="content">
                    <img src={{ url("/storage/images/bg1.jpg") }} alt="UX/UI Design" style="width:100%">
                    <h4>UX/UI Design</h4>
                    <p>Lorem ipsum dolor..</p>
                </div>
            </div>
            <div class="column photo">
                <div class="content">
                    <img src={{ url("/storage/images/bg2.jpg") }} alt="Photo Editing" style="width:100%">
                    <h4>Photo Editing</h4>
                    <p>Lorem ipsum dolor..</p>
                </div>
            </div>
            <div class="column social">
                <div class="content">
                    <img src={{ url("/storage/images/bg0.png") }} alt="Social Media Creative Design" style="width:100%">
                    <h4>Social Media Creative Design</h4>
                    <p>Lorem ipsum dolor..</p>
                </div>
            </div>
            <div class="column logo">
                <div class="content">
                    <img src={{ url("/storage/images/bg3.jpg") }} alt="Logo Design" style="width:100%">
                    <h4>Logo Design</h4>
                    <p>Lorem ipsum dolor..</p>
                </div>
            </div>
        </div>
    </div>
</div>