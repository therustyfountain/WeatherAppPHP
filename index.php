<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Weather App</h1>
        <form action="index.php" method="GET">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>

        <?php
        if (isset($_GET['city'])) {
            $city = htmlspecialchars($_GET['city']);
            include 'weather.php';  // Fetch weather data for the city
        }
        ?>
    </div>
</body>
</html>
