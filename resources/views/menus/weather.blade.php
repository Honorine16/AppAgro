<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body>

    <!-- <div class="card">
        <div class="search">
            <input type="text" placeholder="Entre le nom de la ville" spellcheck="false">
            <button><img src="{{ URL::asset('images/icons8-search-50.png') }}"></button>
        </div>
        <div class="error">
            <p>Nom invalide</p>
        </div>
        <div class="weather">
            <img src="{{ URL::asset('images/icons8-rain-96.png') }}" class="weather-icon">
            <h1 class="temp">22°c</h1>
            <h2 class="city">New York</h2>
            <div class="details">
                <div class="col">
                    <img src="{{ URL::asset('images/humidity.png') }}">
                    <div>
                        <p class="humidity">50%</p>
                        <p>Humidité</p>
                    </div>
                </div>
                <div class="col">
                    <img src="{{ URL::asset('images/icons8-wind-96.png') }}">
                    <div>
                        <p class="wind">15km/h</p>
                        <p>Vitesse du vent</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        const apiKey = "6630d2e6a8122582f621f6d300aa180c";
        const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";


        const searchBox = document.querySelector(".search input");
        const searchBtn = document.querySelector(".search button");
        const weatherIcon = document.querySelector(".weather-icon");

        async function checkWeather(city) {
            const response = await fetch(apiUrl + city + `&appid=${apiKey}`);

            if (response.status == 404) {
                document.querySelector(".error").style.display = "block";
                document.querySelector(".weather").style.display = "none";
            } else {

            }


            var data = await response.json();



            document.querySelector(".city").innerHTML = data.name;
            document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°c";
            document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
            document.querySelector(".wind").innerHTML = data.wind.speed + "km/h";

            if (data.weather[0].main == "Clouds") {
                weatherIcon.scr = "{{ URL::asset('images/clouds.png') }}";
            } else if (data.weather[30].main == "clear") {
                weatherIcon.scr = "{{ URL::asset('images/sun.png') }}";
            } else if (data.weather[21].main == "Rain") {
                weatherIcon.scr = "{{ URL::asset('images/rain.png') }}";
            } else if (data.weather[10].main == "Drizzle") {
                weatherIcon.scr = "{{ URL::asset('images/drizzle.png') }}";
            } else if (data.weather[25].main == "Mist") {
                weatherIcon.scr = "{{ URL::asset('images/mist.png') }}";
            }


            document.querySelector(".weather").style.display = "block"
            document.querySelector(".error").style.display = "none"

        }

        searchBtn.addEventListener("click", () => {
            checkWeather(searchBox.value);
        })

        checkWeather();
    </script> -->

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

        <p>
            <img src="{{ URL::asset('images/icons8-rain-96.png') }}" alt="">
            Température : {{ $weather['main']['temp'] }} °C
        </p>

        <p>
            <img src="{{ URL::asset('images/humidity.png') }}">
            Humidité : {{ $weather['main']['humidity'] }} %
        </p>

        <p>
            <img src="{{ URL::asset('images/icons8-wind-96.png') }}" alt="">
            Vitesse du vent : {{ $weather['wind']['speed'] }} m/s
        </p>

        <p>Conditions : {{ $weather['weather'][0]['description'] }}</p>
        @endif



    </div>
</body>

</html>