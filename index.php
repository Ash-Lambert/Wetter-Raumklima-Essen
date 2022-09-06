<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Popqorn</title>
<link rel="shortcut icon" href="icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/newstyle.css">
<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body onload="wetterJson()">
<script>
 function wetterJson(){
    $.getJSON("http://api.openweathermap.org/data/2.5/weather?id=MY_LOCATION&appid=MY_ID",
		
		function(json){
		var timeData = new Date(json.dt * 1000);
		var temp = json.main.temp - 273.15;
		var gefuehlt = json.main.feels_like - 273.15;
		var humi = json.main.humidity;
		var luftdruck = json.main.pressure;
		var dscptn = json.weather[0].id;
		var windSpeed = json.wind.speed * 3.6;
		var windDeg = json.wind.deg;
		var windspitze = json.wind.gust * 3.6;
		var visibility = json.visibility / 1000;
		var wolken = json.clouds.all;
		var sunRise = new Date(json.sys.sunrise * 1000);
		var sunSet = new Date(json.sys.sunset * 1000);
		var hours = timeData.getHours();
		var minutes = timeData.getMinutes();
		var srHours = sunRise.getHours();
		var srMinutes = sunRise.getMinutes();
		var ssHours = sunSet.getHours();
		var ssMinutes = sunSet.getMinutes();
		
		//führende Null bei Stunden und Minuten < 10 hinzufügen
		hours = ((hours < 10) ? "0" + hours : hours);
		minutes = ((minutes < 10) ? "0" + minutes : minutes);
		srHours = ((srHours < 10) ? "0" + srHours : srHours);
		srMinutes = ((srMinutes < 10) ? "0" + srMinutes : srMinutes);
		ssHours = ((ssHours < 10) ? "0" + ssHours : ssHours);
		ssMinutes = ((ssMinutes < 10) ? "0" + ssMinutes : ssMinutes);
		
		//negative Null bei Temperatur entfernen
		if (temp <= 0.00 && temp >= -0.04) {
			temp = 0.0
		}
		if (gefuehlt <= 0.00 && gefuehlt >= -0.04) {
			gefuehlt = 0.0
		}
		
		//Nachkommastellen auf eine begrenzen
		temp = temp.toFixed(1);
		gefuehlt = gefuehlt.toFixed(1);
		windSpeed = windSpeed.toFixed(1);
		windspitze = windspitze.toFixed(1);
		visibility = visibility.toFixed(1);
			
		//Daten ausgeben
		document.getElementById("time").innerHTML = hours + ":" + minutes;
		document.getElementById("temp").innerHTML = temp + " °C";
		document.getElementById("tempfeel").innerHTML = gefuehlt + " °C";
		document.getElementById("humi").innerHTML = humi + " %";
		document.getElementById("pressure").innerHTML = luftdruck + " hPa";
		document.getElementById("wind").innerHTML = windSpeed + " km/h";
		document.getElementById("windgust").innerHTML = windspitze + " km/h";
		document.getElementById("visibility").innerHTML = visibility + " km";
		document.getElementById("wolken").innerHTML = wolken + " %";
		document.getElementById("auf").innerHTML = srHours + ":" + srMinutes;
		document.getElementById("unter").innerHTML = ssHours + ":" + ssMinutes;
			
		/*Beschreibung und Icon je nach Kondition ausgeben
		Liste der Konditionen unter: https://openweathermap.org/weather-conditions
		oder ausführlicher unter https://gist.github.com/tbranyen/62d974681dea8ee0caa1 */
			
		if (dscptn == "800" || dscptn == "904" || dscptn == "951") {
			if (timeData < sunSet && timeData > sunRise) {
				document.getElementById("desc").innerHTML = "klar";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
			}
			else {
				document.getElementById("desc").innerHTML = "klar";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";	
			}
		}
		else if (dscptn == "801" || dscptn == "802") {
			if (timeData < sunSet && timeData > sunRise) {
				document.getElementById("desc").innerHTML = "leicht bewölkt";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
			}
			else {
				document.getElementById("desc").innerHTML = "leicht bewölkt";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
			}
		}
		else if (dscptn == "803") {
			if (timeData < sunSet && timeData > sunRise) {
				document.getElementById("desc").innerHTML = "bewölkt";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
			}
			else {
				document.getElementById("desc").innerHTML = "bewölkt";
				document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
			}
		}
		else if (dscptn == "804") {
			document.getElementById("desc").innerHTML = "bedeckt";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "300" && dscptn <= "321") {
			document.getElementById("desc").innerHTML = "Nieselregen";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn == "500" || dscptn == "501") {
			document.getElementById("desc").innerHTML = "leichter Regen";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "502" && dscptn <= "504") {
			document.getElementById("desc").innerHTML = "Starkregen";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn == "511") {
			document.getElementById("desc").innerHTML = "gefrierender Regen";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "520" && dscptn <= "531") {
			document.getElementById("desc").innerHTML = "Regen";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "600" && dscptn <= "622") {
			document.getElementById("desc").innerHTML = "Schneefall";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "200" && dscptn <= "232") {
			document.getElementById("desc").innerHTML = "Gewitter";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn >= "701" && dscptn <= "761") {
			document.getElementById("desc").innerHTML = "neblig";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else if (dscptn == "906") {
			document.getElementById("desc").innerHTML = "Hagel";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		else {
			document.getElementById("desc").innerHTML = "Weltuntergang";
			document.getElementById("wetterIcon").src="PATH_TO_YOUR_IMAGE";
		}
		
		//Windrichtung je nach Zahl 0-360 ausgeben
		if (windDeg > "337" || windDeg >= "0" && windDeg < "23") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_S-01.png";
			document.getElementById("windDir").innerHTML = " Norden";
		}
		else if (windDeg > "22" && windDeg < "69") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_SW-01.png";
			document.getElementById("windDir").innerHTML = " Nordosten";
		}
		else if (windDeg > "68" && windDeg < "115") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_W-01.png";
			document.getElementById("windDir").innerHTML = " Osten";
		}
		else if (windDeg > "114" && windDeg < "161") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_NW-01.png";
			document.getElementById("windDir").innerHTML = " Südosten";
		}
		else if (windDeg > "160" && windDeg < "207") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_N-01.png";
			document.getElementById("windDir").innerHTML = " Süden";
		}
		else if (windDeg > "206" && windDeg < "253") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_NO-01.png";
			document.getElementById("windDir").innerHTML = " Südwesten";
		}
		else if (windDeg > "252" && windDeg < "299") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_O-01.png";
			document.getElementById("windDir").innerHTML = " Westen";
		}
		else if (windDeg > "298" && windDeg < "338") {
			document.getElementById("windIcon").src="../img/wetter/pfeil_SO-01.png";
			document.getElementById("windDir").innerHTML = " Nordwesten";
		}
		else {
			document.getElementById("windIcon").innerHTML = "k.A.";
			document.getElementById("windDir").innerHTML = " k.A.";
		}
    });
}
</script>
<input type="checkbox" id="responsive-nav">
<label for="responsive-nav" class="responsive-nav-label"><span>&#9776;</span>Popqorn</label>
<nav>
    <ul>
      <li><a href="index.php">Startseite</a></li><hr>
      <li class="submenu"><a href="#">Wetter extern</a><svg class="dropdownbutton" height="12" width="20">
  <polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
      <ul>
		<li><a href="wetter/datenextern.php">Bad Nauheim</a></li><hr>
		<li><a href="wetter/datenesp8266_draussen.php">Draussen</a></li><hr>
		<li><a href="wetter/sonneaufunter.php">Sunrise/set</a></li><hr>
		<li><a href="wetter/history_extern.php">Historie</a></li>
      </ul>
      </li>
	  <li class="submenu"><a href="#">Wetter intern</a><svg class="dropdownbutton" height="12" width="20">
  <polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
      <ul>
		<li><a href="wetter/datenesp8266_wohnzimmer.php">Wohnzimmer</a></li><hr>
		<li><a href="wetter/datenesp8266_schlafzimmer.php">Schlafzimmer</a></li><hr>
		<li><a href="wetter/datenesp8266_kueche.php">Küche</a></li><hr>
		<li><a href="wetter/datenesp8266_bad.php">Bad</a></li><hr>
		<li><a href="wetter/datenesp8266_flur.php">Flur</a></li><hr>
		<li><a href="wetter/history_intern.php">Historie</a></li>
      </ul>
      </li>
	  <li class="submenu"><a href="#">Medien</a><svg class="dropdownbutton" height="12" width="20">
  <polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
      <ul>
        <li><a href="medien/filme.htm">Filme suchen</a></li><hr>
        <li><a href="medien/filme_erzeugen.php">Film hinzufügen</a></li><hr>
		<li><a href="medien/serien.htm">Serien suchen</a></li><hr>
		<li><a href="medien/serien_erzeugen.php">Serie hinzufügen</a></li>
      </ul>
      </li>
	  <li><a href="essen/index.php">Essen</a></li><hr>
      <li><a href="mischen/index.htm">Sirup</a></li><hr>
	  <li><a href="popqorn/index.htm" target="_blank">Popqorn</a></li>
    </ul>
</nav>
<div class="mainPageBoxen">
<a href="wetter/datenextern.php">
<div class="mainpagebutton1">
	<h2>Bad Nauheim</h2><hr class="mainPageLine">
	<div class="TableTop1">
	<img class='mainPageTopIcons' src='../img/wetter/clock05.png'>
	<p class="linksbuendig" id="time"></p>
	<img class="mainPageTopIcons" src='../img/wetter/temperature04.png'>
	<p class="linksbuendig" id="temp"></p>
	<img class="mainPageTopIcons" src='../img/wetter/temperature_feels_like01.png'>
	<p class="linksbuendig" id="tempfeel"></p>
	<img class="mainPageTopIcons" src='../img/wetter/luftfeuchte02.png'>
	<p class="linksbuendig" id="humi"></p>
	<img class="mainPageTopIcons" src='../img/wetter/luftdruck02.png'>
	<p class="linksbuendig" id="pressure"></p>
	<img class="mainPageTopIcons" src='../img/wetter/sonnenaufgang04.png'>
	<p class="linksbuendig" id="auf"></p>
	<img class="mainPageTopIcons" src='../img/wetter/sonnenuntergang04.png'>
	<p class="linksbuendig" id="unter"></p>
	</div>
	<div class="TableTop2">
	<img class="mainPageTopIcons" src='../img/wetter/direction02.png'>
	<img class='mainPageWindDirectionIcon' id="windIcon">
	<img class="mainPageTopIcons" src='../img/wetter/compass01.png'>
	<p class="linksbuendig" id="windDir"></p>
	<img class="mainPageTopIcons" src='../img/wetter/windspeed03.png'>
	<p class="linksbuendig" id="wind"></p>
	<img class="mainPageTopIcons" src='../img/wetter/wind_gust01.png'>
	<p class="linksbuendig" id="windgust"></p>
	<img class="mainPageTopIcons" src='../img/wetter/eye02.png'>
	<p class="linksbuendig" id="visibility"></p>
	<img class="mainPageTopIcons" src='../img/wetter/wolken02.png'>
	<p class="linksbuendig" id="wolken"></p>
	<img class="mainPageTopIcons" src='../img/wetter/description02.png'>
	<p class="linksbuendig" id="desc"></p>
	</div>
	<div class="TableTop3">
	<img class="wetterIconMain" id="wetterIcon">
	</div>
	</div>
	</a>
<a href="wetter/datenesp8266_wohnzimmer.php">
<div class="mainpagebutton2">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM wohnzimmer ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Wohnzimmer</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
<a href="wetter/datenesp8266_draussen.php">
<div class="mainpagebutton3">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM draussen ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Draußen</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
<div>
<a href="wetter/datenesp8266_schlafzimmer.php">
<div class="mainpagebutton4">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM schlafzimmer ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Schlafzimmer</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
<a href="wetter/datenesp8266_bad.php">
<div class="mainpagebutton5">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM bad ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Bad</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
<a href="wetter/datenesp8266_kueche.php">
<div class="mainpagebutton6">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM kueche ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Küche</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
<a href="wetter/datenesp8266_flur.php">
<div class="mainpagebutton7">
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM flur ORDER BY id DESC LIMIT 1;");
   
      while ($dsatz = mysqli_fetch_assoc($res)) {

      echo '<h2>Flur</h2><hr class="mainPageLine">';
	  echo "<img class='mainPageClock' src='img/wetter/clock05.png'>" . "<p class='linksbuendig'>" . $dsatz["zeit"] . "</p>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/temperature04.png'>" . "<p class='linksbuendig'>" . $dsatz["temp"] . "</p>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<img class='mainPageWeatherIcons' src='img/wetter/luftfeuchte02.png'>" . "<p class='linksbuendig'>" . $dsatz["humi"] . "</p>";
	  }
   mysqli_close($con);
?>
</div>
</a>
</div>
<a href="medien/filme.htm">
<div class="mainpagebutton8">
<img class="mainPageImage" src="img/media01.png">
<p class="mainPageText">Medien</p>
</div>
</a>
<a href="essen/index.php">
<div class="mainpagebutton9">
<img class="mainPageImage" src="img/essen01.png">
<p class="mainPageText">Rezepte</p>
</div>
</div>
</a>
<br><br><br><br>
<div class="navbar">
  <a href="index.php" class="active"><img class="tableWeatherIcons" src="img/bottommenu/home01.png"></a>
  <a href="wetter/datenextern.php"><img class="tableWeatherIcons" src="img/bottommenu/weather_station02.png"></a>
  <a href="wetter/datenesp8266_draussen.php"><img class="tableWeatherIcons" src="img/bottommenu/draussen01.png"></a>
  <a href="wetter/datenesp8266_wohnzimmer.php"><img class="tableWeatherIcons" src="img/bottommenu/wohnzimmer01.png"></a>
  <a href="wetter/datenesp8266_schlafzimmer.php"><img class="tableWeatherIcons" src="img/bottommenu/schlafzimmer01.png"></a>
  <a href="wetter/datenesp8266_bad.php"><img class="tableWeatherIcons" src="img/bottommenu/bad01.png"></a>
  <a href="wetter/datenesp8266_kueche.php"><img class="tableWeatherIcons" src="img/bottommenu/kueche01.png"></a>
  <a href="wetter/datenesp8266_flur.php"><img class="tableWeatherIcons" src="img/bottommenu/flur01.png"></a>
</div>
</body>
</html>