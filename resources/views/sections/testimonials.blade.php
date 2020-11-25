<div id="testimonials" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        @foreach($testimonials as $testimonial)
            <div class="carousel-item text-center {{ $testimonial->id == $firstTestimonialId ? 'active' : '' }}" data-interval="5000">
                <div class="row">
                    <div class="col">
                        <div class="testimonial-name-container">
                            <img src="{{ asset('storage/'.$testimonial->image) }}" class="testimonial-image" alt="{{ $testimonial->company . 'testimonial' }}">
                            <h4><strong>{{ $testimonial->name }}</strong></h4>
                        </div>
                        <a href="{{ $testimonial->link }}" class="testimonial_subtitle" title="{{'Go to ' .  $testimonial->company }}">
                            <span>{{ $testimonial->company }}</span>
                        </a>
                        <p class="testimonial_para">{{ $testimonial->testimonial }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <a class="carousel-control-prev" href="#testimonials" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#testimonials" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
