<div class="portfolio-gallery">
    <div class="row"> 
        @php
            foreach ($uxImages as $file) {
                echo '<div class="column ux">';
                echo '<img src="'.$file->getPathname().'" alt="UX/UI Design">';
                echo '</div>';
            }
            foreach ($photoImages as $file) {
                echo '<div class="column photo">';
                echo '<img src="'.$file->getPathname().'" alt="Photo Editing">';
                echo '</div>';
            }
            foreach ($socialImages as $file) {
                echo '<div class="column social">';
                echo '<img src="'.$file->getPathname().'" alt="Social Media Creative Design">';
                echo '</div>';
            }
            foreach ($logoImages as $file) {
                echo '<div class="column logo">';
                echo '<img src="'.$file->getPathname().'" alt="Logo Design">';
                echo '</div>';
            }
        @endphp
    </div>
</div>