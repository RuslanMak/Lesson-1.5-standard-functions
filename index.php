<?php
$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=48ca7ca21381462c0cee89238cc15fc8');
$data = json_decode($json, true);

$arrayWeather = [$data];
$temperatureC = round($data['main']['temp'], 1) - 273;
?>

<html>
<head>
    <title>Weather</title>
</head>

<body>
    <?php if($data) : ?>
        <?php foreach ($arrayWeather as $data): ?>
            <h1><?php echo $data['name'] ?></h1>
            <div></div>
            <?php echo "<img src=\"http://openweathermap.org/img/w/" . $data['weather']['0']['icon'] . ".png\">" . "<br>" ?>
            <?php echo "<b>Temperature: </b>" . $temperatureC . "&#176" . "<br>" ?>
            <?php echo "<b>Weather: </b>" . $data['weather']['0']['main'] . "<br>" ?>
            <?php echo "<b>Sky: </b>" . $data['weather']['0']['description'] . "<br>" ?>
            <?php echo "<b>Humidity: </b>" . $data['main']['humidity'] . " %" . "<br>" ?>
            <?php echo "<b>Wind speed: </b>" . $data['wind']['speed'] . " meter/sec" . "<br>" ?>
            <?php echo "<b>Cloudiness: </b>" . $data['clouds']['all'] . "%" ?>
            <?php echo "<b>Atmospheric pressure: </b>" . $data['main']['pressure'] . " hPa" . "<br>" ?>
        <?php endforeach; ?>

    <?php else : ?>
        <?php echo "Сервер не доступен!" ?>
    <?php endif; ?>
</body>
</html>





