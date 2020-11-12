<div class="masonry" itemscope itemtype="http://schema.org/ImageGallery">

    @foreach ($uxImages as $file)
        <figure class="grid ux" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ $file['large_image'] }}" itemprop="contentUrl" data-size="{{ $file['size'] }}">
                <img src="{{ $file['thumbnail'] }}" itemprop="thumbnail" alt="{{ $file['title'] }}" loading="lazy">
            </a>
            <div class="grid__body">
                <div class="relative">
                    <figcaption class="grid__title" itemprop="caption description">{{ $file['title'] }}</figcaption>
                </div>
            </div>
        </figure>
    @endforeach

    @foreach ($photoImages as $file)
        <figure class="grid photo" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ $file['large_image'] }}" itemprop="contentUrl" data-size="{{ $file['size'] }}">
                <img src="{{ $file['thumbnail'] }}" itemprop="thumbnail" alt="{{ $file['title'] }}" loading="lazy">
            </a>
            <div class="grid__body">
                <div class="relative">
                    <figcaption class="grid__title" itemprop="caption description">{{ $file['title'] }}</figcaption>
                </div>
            </div>
        </figure>
    @endforeach

    @foreach ($socialImages as $file)
        <figure class="grid social" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ $file['large_image'] }}" itemprop="contentUrl" data-size="{{ $file['size'] }}">
                <img src="{{ $file['thumbnail'] }}" itemprop="thumbnail" alt="{{ $file['title'] }}" loading="lazy">
            </a>
            <div class="grid__body">
                <div class="relative">
                    <figcaption class="grid__title" itemprop="caption description">{{ $file['title'] }}</figcaption>
                </div>
            </div>
        </figure>
    @endforeach
    
    @foreach ($logoImages as $file)
        <figure class="grid logo" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ $file['large_image'] }}" itemprop="contentUrl" data-size="{{ $file['size'] }}">
                <img src="{{ $file['thumbnail'] }}" itemprop="thumbnail" alt="{{ $file['title'] }}" loading="lazy">
            </a>
            <div class="grid__body">
                <div class="relative">
                    <figcaption class="grid__title" itemprop="caption description">{{ $file['title'] }}</figcaption>
                </div>
            </div>
        </figure>
    @endforeach

</div>


@include('sections.photoswipe')