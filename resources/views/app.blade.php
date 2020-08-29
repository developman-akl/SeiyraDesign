<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Seiyra Design</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body id="main-scrollbar">
    <section id="header">
        @include('sections.header')
    </section>

    <div class="container">
        <section id="home">
            @include('sections.home')
        </section>
        <section id="services">
            @include('sections.services')
        </section>
        <section id="portfolio">
            @include('sections.portfolio')
        </section>
        <section id="contact">
            @include('sections.contact')
        </section>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
