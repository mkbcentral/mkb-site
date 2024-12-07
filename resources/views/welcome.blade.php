<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('prof.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900">
<!-- Header/Navigation -->
@include('layouts.partials.navbar')

<!-- Hero Section -->
@include('components.content.hero')

<!-- Wave Divider -->
<div class="wave-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-blue-900/10">
        </path>
    </svg>
</div>
<!-- About Section -->
@include('components.content.about')
<!-- Wave Divider -->
<div class="wave-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-blue-900/10">
        </path>
    </svg>
</div>
<!-- Projects Section -->
@include('components.content.projects')
<!-- Wave Divider -->
<div class="wave-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-blue-900/10">
        </path>
    </svg>
</div>
<!-- Video Section -->
@include('components.content.videos')
<!-- Wave Divider -->
<div class="wave-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-blue-900/10">
        </path>
    </svg>
</div>
<!-- Social Media Followers Section -->
@include('components.content.social-media')

<!-- Wave Divider -->
<div class="wave-divider">
    <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            fill="currentColor" class="text-blue-900/10">
        </path>
    </svg>
</div>

<!-- Contact & Social Media Section -->
@include('components.content.contact')

<!-- Footer -->
@include('layouts.partials.footer');
<script type="text/javascript" src="{{asset('main.js')}}"></script>
</body>
</html>
