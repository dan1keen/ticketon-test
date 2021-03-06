<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>
    <title>Ticketon Test</title>
</head>
<body>
<div id="app">
    <main class="py-4">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">

                <ul class="uk-navbar-nav">
                    <li class="{{ Route::currentRouteName() === 'image.index' ? 'uk-active' : '' }}">
                        <a href="{{ route('image.index') }}">Загрузить</a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'image.list' ? 'uk-active' : '' }}">
                        <a href="{{ route('image.list') }}">К списку загруженных частей</a>
                    </li>
                </ul>

            </div>
        </nav>
        @yield('content')
    </main>
</div>
@yield('scripts')
</body>
</html>
