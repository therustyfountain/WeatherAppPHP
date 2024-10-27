<?php
function getApiKey() {
    // If using dotenv, you can load the API key here
    // Uncomment the following if you have an .env file
    // require 'vendor/autoload.php';
    // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    // $dotenv->load();
    
    // Use `$_ENV['API_KEY']` if using dotenv; otherwise, set API key here:
    return 'your_openweather_api_key';
}

function getWeatherData($city) {
    $apiKey = getApiKey();
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    
    // Fetch data from the API
    $response = file_get_contents($url);
    return json_decode($response, true);
}

$weatherData = getWeatherData($city);

if ($weatherData && $weatherData['cod'] === 200) {
    $temperature = $weatherData['main']['temp'];
    $description = $weatherData['weather'][0]['description'];
    $icon = $weatherData['weather'][0]['icon'];
    $cityName = $weatherData['name'];
    
    echo "<div class='weather-result'>";
    echo "<h2>Weather in $cityName</h2>";
    echo "<p><img src='http://openweathermap.org/img/wn/$icon@2x.png' alt='$description'> $temperature°C, $description</p>";
    echo "</div>";
} else {
    echo "<p>Weather data not found for this location. Please try another city.</p>";
}
?>
