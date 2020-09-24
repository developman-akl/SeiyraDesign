<div class="portfolio-gallery">
    <div class="masonry">
        @php
            foreach ($uxImages as $file) {
                echo '<div class="grid ux">';
                    echo '<img src="'.$file->getPathname().'" alt="UX/UI Design">';
                    echo '<div class="grid__body">';
                        echo '<div class="relative">';
                            echo '<h1 class="grid__title">' . substr($file->getBasename(), 0, -4) . '</h1>';
                            echo '</div>';
                        // echo '<div class="mt-auto">';
                        //     echo '<span class="grid__tag">UX/UI Design</span>';
                        // echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            foreach ($photoImages as $file) {
                echo '<div class="grid photo">';
                    echo '<img src="'.$file->getPathname().'" alt="Photo Editing">';
                    echo '<div class="grid__body">';
                        echo '<div class="relative">';
                            echo '<h1 class="grid__title">' . substr($file->getBasename(), 0, -4) . '</h1>';
                            echo '</div>';
                        // echo '<div class="mt-auto">';
                        //     echo '<span class="grid__tag">Photo Editing</span>';
                        // echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            foreach ($socialImages as $file) {
                echo '<div class="grid social">';
                    echo '<img src="'.$file->getPathname().'" alt="Social Media Creative Design">';
                    echo '<div class="grid__body">';
                        echo '<div class="relative">';
                            echo '<h1 class="grid__title">' . substr($file->getBasename(), 0, -4) . '</h1>';
                            echo '</div>';
                        // echo '<div class="mt-auto">';
                        //     echo '<span class="grid__tag">Social Media Creative Design</span>';
                        // echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            foreach ($logoImages as $file) {
                echo '<div class="grid logo">';
                    echo '<img src="'.$file->getPathname().'" alt="Logo Design">';
                    echo '<div class="grid__body">';
                        echo '<div class="relative">';
                            echo '<h1 class="grid__title">' . substr($file->getBasename(), 0, -4) . '</h1>';
                            echo '</div>';
                        // echo '<div class="mt-auto">';
                        //     echo '<span class="grid__tag">Logo Design</span>';
                        // echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        @endphp
    </div>
</div>