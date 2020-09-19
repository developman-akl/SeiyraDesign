<div class="container full-width">

    <div class="section-title">
        <h1>{{ setting('contact.title') }}</h1>
        <span class="border"></span>
        
        <p>{{ setting('contact.description') }}</p>
    </div>
    
    <div class="contact-container mx-auto mt-4">
        <div class="response_message"></div>
        <div class="row">
            <div class="col d-flex flex-column justify-content-between">
                <div class="form-group required {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" class="form-control" name="contact-name" id="contact-name" placeholder="Your Name">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="form-group required {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" class="form-control" name="contact-email" id="contact-email" placeholder="Your Email Address">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group required {{ $errors->has('subject') ? 'has-error' : '' }}">
                    <select
                        class="form-control {{ $errors->has('order_type') ? 'is-invalid' : '' }}"
                        name="contact-subject" id="contact-subject">
                        <option value disabled selected>Message Subject</option>
                        @foreach(App\Http\Controllers\ContactMeController::SUBJECT_SELECT as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                </div>
            </div>
            <div class="col d-flex flex-column justify-content-between">
                <div class="form-group required {{ $errors->has('message') ? 'has-error' : '' }}">
                    <textarea class="form-control" name="contact-message" id="contact-message" placeholder="Your Message" maxlength="320"></textarea>
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                </div>
                <div class="form-group">
                    <button type="submit" form="contact-form" id="btn-contact-send" class="btn btn-success btn-block"><span>SEND</button>
                </div>
            </div>
        </div>
    </div>
</div>


@include('sections.footer')
