<div class="portfolio-gallery">
    <div id="masonry" class="masonry">
        @foreach ($uxImages as $file)
            <div class="grid ux">
                <img class="img-modal-simple lazy" src="{{ $file->getPathname() }}" alt="{{ substr($file->getBasename(), 0, -4) }}">
                <div class="grid__body">
                    <div class="relative">
                        <h2 class="grid__title">{{ substr($file->getBasename(), 0, -4) }} </h1>
                    </div>
                    {{-- <div class="mt-auto">
                        <span class="grid__tag">UX/UI Design</span>
                    </div> --}}
                </div>
            </div>
        @endforeach
        @foreach ($photoImages as $file)
            <div class="grid photo">
                <img class="img-modal-simple lazy" src="{{ $file->getPathname() }}" alt="{{ substr($file->getBasename(), 0, -4) }}">
                <div class="grid__body">
                    <div class="relative">
                        <h2 class="grid__title"> {{ substr($file->getBasename(), 0, -4) }}</h1>
                    </div>
                    {{-- <div class="mt-auto">
                        <span class="grid__tag">Photo Editing</span>
                    </div> --}}
                </div>
            </div>
        @endforeach
        @foreach ($socialImages as $file)
            <div class="grid social">
                <img class="img-modal-simple lazy" src="{{ $file->getPathname() }}" alt="{{ substr($file->getBasename(), 0, -4) }}">
                <div class="grid__body">
                    <div class="relative">
                        <h2 class="grid__title"> {{ substr($file->getBasename(), 0, -4) }}</h1>
                    </div>
                    {{-- <div class="mt-auto">
                        <span class="grid__tag">Social Media Creative Design</span>
                    </div> --}}
                </div>
            </div>
        @endforeach
        @foreach ($logoImages as $file)
            <div class="grid logo">
                <img class="img-modal-simple lazy" src="{{ $file->getPathname() }}" alt="{{ substr($file->getBasename(), 0, -4) }}">
                <div class="grid__body">
                    <div class="relative">
                        <h2 class="grid__title"> {{ substr($file->getBasename(), 0, -4) }} </h1>
                    </div>
                    {{-- <div class="mt-auto">
                        <span class="grid__tag">Logo Design</span>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>