<?php


if(isset($_POST['search'])){
    $city = $_POST['search'];
}else{
    $city = "london";
}

$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=a8265a1592d25e920dde7e7da4abdb5e&units=metric";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>


<!doctype html>
<html>
<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: #929292;
}

.report-container {
    border: #E0E0E0 1px solid;
    padding: 20px 40px 40px 40px;
    border-radius: 2px;
    width: 550px;
    margin: 0 auto;
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #212121;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    margin-left: 15px;
    color: #929292;
}



.time {
    line-height: 25px;
}
</style>

    <?php include_once 'header.php'?>

<body>

    <div class="report-container">
        <form action="weather.php" method="post"> 
            <input name="search" type="text", placeholder="Search for Citys...">
            <input type="submit" value="Search"/>
        </form>  
        
        <div style="height: 10px"></div>

            <?php 
            
            if($httpcode != 200){
                echo "No city found";
            }else{
                
                $description = $data->weather[0]->description;
                $icon = $data->weather[0]->icon;
                $maxTemp = $data->main->temp_max;
                $miniTemp = $data->main->temp_min;
                $wind = $data->wind->speed;

                ?>

               <h2><?php echo $data->name; ?> Weather Status</h2>
                <div class="time">
                    <div><?php echo date("l g:i a", $currentTime); ?></div>
                    <div><?php echo date("jS F, Y",$currentTime); ?></div>
                    <div><?php echo ucwords($description); ?></div>
                </div>
                <div class="weather-forecast">
                    <img
                        src="http://openweathermap.org/img/w/<?php echo $icon; ?>.png"
                        class="weather-icon" /> <?php echo $maxTemp; ?>°C<span
                        class="min-temperature"><?php echo $miniTemp; ?>°C</span>
                </div>
                <div class="time">
                    <div>Wind: <?php echo $wind; ?> km/h</div>
                </div>
                <?php
            }
            ?>
    </div>
</body>
</html>