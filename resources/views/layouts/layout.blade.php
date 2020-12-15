<!DOCTYPE html>
<html lang="en">

<head>

    {{-- SEO --}}
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="{{ setting('site.description') }}">
    <meta name="keywords" content="{{ setting('site.keywords') }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');

    </script>
    
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '142022823929661');
        fbq('track', 'PageView');

    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=142022823929661&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Hotjar Tracking Code for https://seiyradesign.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2157156,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- End Hotjar Tracking Code for https://seiyradesign.com/ -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="https://use.typekit.net/fwy1qqq.css" rel="stylesheet">

    <link rel="icon" href="{{ URL::asset('storage/images/favicon.png') }}"
        type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ URL::asset('storage/images/favicon.png') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- robots.txt -->
    {!! Robots::metaTag() !!}

</head>
