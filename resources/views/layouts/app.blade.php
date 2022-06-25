<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">

        <script src="{{ mix('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Laravel' )}}</title>
    </head>
    <body>
        <div class="app" id="app">
            <nav class="navigation">
                @if (!empty($title))
                    <h2 class="navigation__title">{{$title}}</h2>
                @endif
                <a class="navigation__link" href="/clients">Clients</a>
                <a class="navigation__link" href="/order_types">Order Types</a>
                <a class="navigation__link" href="/inactive_clients">Inactive Clients</a>
                <a class="navigation__link" href="/last_deliveries">Last Deliveries</a>
            </nav>

            @yield('content')
            
        </div>
    </body>
</html>
