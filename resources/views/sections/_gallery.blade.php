{{-- <style>
    .portfolio {
        position: relative;
    }

    .portfolio .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
    }

    /* Add padding BETWEEN each column */
    .portfolio .row,
    .portfolio .row>.column {
        padding: 4px;
    }

    /* Create three equal columns that floats next to each other */
    .portfolio .column {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
        display: none;
        /* Hide all elements by default */
    }

    .portfolio .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
        border-radius: 5px;
    }

    /* Clear floats after rows */
    .portfolio .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 800px) {
        .portfolio .column {
            -ms-flex: 50%;
            flex: 50%;
            max-width: 50%;
        }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .portfolio .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
        }
    }

    /* The "show" class is added to the filtered elements */
    .portfolio .show {
        display: block;
    }
</style> --}}

<div class="portfolio">
    <div class="row"> 
        @php
            foreach ($uxImages as $file) {
                echo '<div class="column ux">';
                echo '<img src="'.$file->getPathname().'" alt="UX/UI Design" style="width:100%">';
                echo '</div>';
            }
        @endphp
        @php
            foreach ($photoImages as $file) {
                echo '<div class="column photo">';
                echo '<img src="'.$file->getPathname().'" alt="Photo Editing" style="width:100%">';
                echo '</div>';
            }
        @endphp
        @php
            foreach ($socialImages as $file) {
                echo '<div class="column social">';
                echo '<img src="'.$file->getPathname().'" alt="Social Media Creative Design" style="width:100%">';
                echo '</div>';
            }
        @endphp
        @php
            foreach ($logoImages as $file) {
                echo '<div class="column logo">';
                echo '<img src="'.$file->getPathname().'" alt="Logo Design" style="width:100%">';
                echo '</div>';
            }
        @endphp
    </div>
</div>