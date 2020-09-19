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
                <img src={{ url("/storage/images/bg1.jpg") }} alt="UX/UI Design" style="width:100%">
                {{-- @php
                $files = glob("images/*.*");
                for ($i=0; $i<count($files); $i++)
                {
                    $image = $files[$i];
                    $supported_file = array(
                            'gif',
                            'jpg',
                            'jpeg',
                            'png'
                        );
        
                    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    if (in_array($ext, $supported_file)) {
                        echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
                        echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
                    } else {
                        continue;
                    }
                }
                @endphp --}}
            </div>
            <div class="column photo">
                <img src={{ url("/storage/images/bg2.jpg") }} alt="Photo Editing" style="width:100%">
            </div>
            <div class="column social">
                <img src={{ url("/storage/images/bg0.png") }} alt="Social Media Creative Design" style="width:100%">
            </div>
            <div class="column logo">
                <img src={{ url("/storage/images/bg3.jpg") }} alt="Logo Design" style="width:100%">
            </div>
        </div>
    </div>
</div>