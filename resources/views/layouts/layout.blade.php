<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ setting('site.title') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="https://use.typekit.net/fwy1qqq.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

</head>