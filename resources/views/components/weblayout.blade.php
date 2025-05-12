<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{ $page_description??'' }}">
        <meta name="keywords" content="{{ $page_keywords??'' }}">
        <meta name="author" content="Your Name">
        <meta name="robots" content="index, follow">
        <title>{{ $title??'Fun Book Karo' }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/icon/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('images/icon/favicon.png') }}" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icon/apple-touch-icon.png') }}">
        {{-- <link rel="icon" type="image/png" sizes="32x32" href="/path/to/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/path/to/favicon-16x16.png">
        <link rel="manifest" href="/path/to/site.webmanifest"> --}}

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="{{ $title??'' }}">
        <meta property="og:description" content="{{ $page_description??'' }}">
        <meta property="og:image" content="URL to an image">
        <meta property="og:url" content="URL of the page">

        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title??'' }}">
        <meta name="twitter:description" content="{{ $page_description??'' }}">
        <meta name="twitter:image" content="URL to an image">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    </head>
    <body>
        <x-navbar />
        <x-modal />
        {{ $slot }}
        <x-footer />
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
</html>
