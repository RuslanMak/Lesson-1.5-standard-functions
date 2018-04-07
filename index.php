<?php
$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=48ca7ca21381462c0cee89238cc15fc8');
$data = json_decode($json, true);

?>

<html>
<head>
    <title>Test</title>
</head>

<body>
    <h1><?php echo $data['name'] ?></h1>
    <div></div>
    <img src="http://openweathermap.org/img/w/<?php echo $data['weather']['0']['icon'] ?>.png">
    <p><b>Temperature: </b><?php echo round($data['main']['temp'], 1) - 273 ?>&#176</p>
    <p><b>Weather: </b><?php echo $data['weather']['0']['main'] ?></p>
    <p><b>Sky: </b><?php echo $data['weather']['0']['description'] ?></p>
    <p><b>Humidity: </b><?php echo $data['main']['humidity'] ?>%</p>
    <p><b>Wind speed: </b><?php echo $data['wind']['speed'] ?> meter/sec</p>
    <p><b>Cloudiness: </b><?php echo $data['clouds']['all'] ?>%</p>
    <p><b>Atmospheric pressure: </b><?php echo $data['main']['pressure'] ?> hPa</p>
</body>
</html>


