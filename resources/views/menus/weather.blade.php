<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Météo</title>
</head>

<body>
    @include('includes.sidebar')

    <div class="card">
        <form action="{{ url('/weather') }}" method="GET">
            <div class="search">
                <input type="text" placeholder="Entrez le nom de la ville" name="city" id="city" spellcheck="false" required>
                <button type="submit"><img src="{{ URL::asset('images/icons8-search-50.png') }}"></button>
            </div>
        </form>

        @if(isset($weather))
        <button class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Météo pour {{ $weather['name'] }}
        </button>
        <p>Température : {{ $weather['main']['temp'] }} °C</p>
        <p> Humidité : {{ $weather['main']['humidity'] }} %</p>
        <p>Vitesse du vent : {{ $weather['wind']['speed'] }} m/s</p>
        <p>Conditions : {{ $weather['weather'][0]['description'] }}</p>
        @endif
    </div>
</body>

</html>