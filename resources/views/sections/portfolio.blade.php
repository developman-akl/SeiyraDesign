<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('portfolio.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('portfolio.description') }}</p>
    </div>

    <div class="portfolio">
        <div class="row">
            <div class="col text-center mt-3" id="portfolioBtnContainer">
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
                @php
                    foreach ($uxImages as $file) {
                        echo '<img src="'.$file->getPathname().'" alt="UX/UI Design" style="width:100%">';
                    }
                @endphp
            </div>
            <div class="column photo">
                @php
                    foreach ($photoImages as $file) {
                        echo '<img src="'.$file->getPathname().'" alt="Photo Editing" style="width:100%">';
                    }
                @endphp
            </div>
            <div class="column social">
                @php
                    foreach ($socialImages as $file) {
                        echo '<img src="'.$file->getPathname().'" alt="Social Media Creative Design" style="width:100%">';
                    }
                @endphp
            </div>
            <div class="column logo">
                @php
                    foreach ($logoImages as $file) {
                        echo '<img src="'.$file->getPathname().'" alt="Logo Design" style="width:100%">';
                    }
                @endphp
            </div>
        </div>
    </div>
</div>