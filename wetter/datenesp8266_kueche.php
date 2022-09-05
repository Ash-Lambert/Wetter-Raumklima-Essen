<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Wetter Küche</title>
		<link rel="shortcut icon" href="../icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/newstyle.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
<input type="checkbox" id="responsive-nav">
<label for="responsive-nav" class="responsive-nav-label"><span>&#9776;</span>Popqorn</label>
<nav>
    <ul>
      <li><a href="../index.php">Startseite</a></li><hr>
      <li class="submenu"><a href="#">Wetter extern</a><svg class="dropdownbutton" height="12" width="20">
<polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
<ul>
<li><a href="datenextern.php">Bad Nauheim</a></li><hr>
<li><a href="datenesp8266_draussen.php">Draussen</a></li><hr>
<li><a href="sonneaufunter.php">Sunrise/set</a></li><hr>
<li><a href="history_extern.php">Historie</a></li>
</ul>
</li>
<li class="submenu"><a href="#">Wetter intern</a><svg class="dropdownbutton" height="12" width="20">
<polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
<ul>
<li><a href="datenesp8266_wohnzimmer.php">Wohnzimmer</a></li><hr>
<li><a href="datenesp8266_schlafzimmer.php">Schlafzimmer</a></li><hr>
<li><a href="datenesp8266_kueche.php">Küche</a></li><hr>
<li><a href="datenesp8266_bad.php">Bad</a></li><hr>
<li><a href="datenesp8266_flur.php">Flur</a></li><hr>
<li><a href="history_intern.php">Historie</a></li>
</ul>
</li>
	  <li class="submenu"><a href="#">Medien</a><svg class="dropdownbutton" height="12" width="20">
  <polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
      <ul>
        <li><a href="../medien/filme.htm">Filme suchen</a></li><hr>
        <li><a href="../medien/filme_erzeugen.php">Film hinzufügen</a></li><hr>
		<li><a href="../medien/serien.htm">Serien suchen</a></li><hr>
		<li><a href="../medien/serien_erzeugen.php">Serie hinzufügen</a></li>
      </ul>
      </li>
	  <li><a href="../essen/index.htm">Essen</a></li><hr>
      <li><a href="../mischen/index.htm">Sirup</a></li><hr>
	  <li><a href="../popqorn/index.htm" target="_blank">Popqorn</a></li>
    </ul>
</nav>
  <br>
  <p class='wettertabelleueberschrift'>Wetter Küche</p><hr>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT MIN(temp) AS MinTemp, MAX(temp) AS MaxTemp, Min(humi) AS MinHumi, MAX(humi) AS MaxHumi FROM
 (SELECT temp, humi
  FROM kueche
  WHERE datum = CURRENT_DATE
 ) as minmaxtemp;");

   echo "<table class='wettertabelle'>";
   echo "<tr><th colspan='3'>Grenzwerte heute</th>";
   echo "<tr><th></th><th><img class='tableWeatherIcons' src='../img/wetter/temperature04.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/luftfeuchte02.png'></th>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . "Minimum" . "</td>";
	  $dsatz["MinTemp"] = number_format($dsatz["MinTemp"], 1);
	  echo "<td class='td'>" . $dsatz["MinTemp"] . "°C" . "</td>";
	  $dsatz["MinHumi"] = number_format($dsatz["MinHumi"], 1);
	  echo "<td class='td'>" . $dsatz["MinHumi"] . "%" . "</td>";
      echo "</tr>";
	  echo "<tr>";
	  echo "<td class='td'>" . "Maximum" . "</td>";
	  $dsatz["MaxTemp"] = number_format($dsatz["MaxTemp"], 1);
	  echo "<td class='td'>" . $dsatz["MaxTemp"] . "°C" . "</td>";
	  $dsatz["MaxHumi"] = number_format($dsatz["MaxHumi"], 1);
	  echo "<td class='td'>" . $dsatz["MaxHumi"] . "%" . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT MIN(temp) AS MinTemp, MAX(temp) AS MaxTemp, Min(humi) AS MinHumi, MAX(humi) AS MaxHumi FROM
 (SELECT temp, humi
  FROM kueche
  WHERE datum = CURDATE() - INTERVAL 1 DAY) as minmaxtemp;");

   echo "<table class='wettertabelle'>";
   echo "<tr><th colspan='3'>Grenzwerte gestern</th>";
   echo "<tr><th></th><th><img class='tableWeatherIcons' src='../img/wetter/temperature04.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/luftfeuchte02.png'></th>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . "Minimum" . "</td>";
	  $dsatz["MinTemp"] = number_format($dsatz["MinTemp"], 1);
	  echo "<td class='td'>" . $dsatz["MinTemp"] . "°C" . "</td>";
	  $dsatz["MinHumi"] = number_format($dsatz["MinHumi"], 1);
	  echo "<td class='td'>" . $dsatz["MinHumi"] . "%" . "</td>";
      echo "</tr>";
	  echo "<tr>";
	  echo "<td class='td'>" . "Maximum" . "</td>";
	  $dsatz["MaxTemp"] = number_format($dsatz["MaxTemp"], 1);
	  echo "<td class='td'>" . $dsatz["MaxTemp"] . "°C" . "</td>";
	  $dsatz["MaxHumi"] = number_format($dsatz["MaxHumi"], 1);
	  echo "<td class='td'>" . $dsatz["MaxHumi"] . "%" . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(datum, '%d.%m.') AS datum, DATE_FORMAT(zeit, '%H:%i') AS zeit, temp, humi FROM kueche ORDER BY id DESC LIMIT 49;");

   echo "<table class='wettertabelle'>";
   echo "<tr><th colspan='4'>24h Tabelle</th>";
   echo "<tr><th><img class='tableWeatherIcons' src='../img/wetter/calendar02.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/clock03.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/temperature04.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/luftfeuchte02.png'></th>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . $dsatz["datum"] . "</td>";
      echo "<td class='td'>" . $dsatz["zeit"] . "</td>";
	  $dsatz["temp"] = number_format($dsatz["temp"], 1);
	  echo "<td class='td'>" . $dsatz["temp"] . "</td>";
	  $dsatz["humi"] = number_format($dsatz["humi"], 1);
	  echo "<td class='td'>" . $dsatz["humi"] . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br><br><br>
<div class="navbar">
  <a href="../index.php"><img class="tableWeatherIcons" src="../img/bottommenu/home01.png"></a>
  <a href="datenextern.php"><img class="tableWeatherIcons" src="../img/bottommenu/weather_station02.png"></a>
  <a href="datenesp8266_draussen.php"><img class="tableWeatherIcons" src="../img/bottommenu/draussen01.png"></a>
  <a href="datenesp8266_wohnzimmer.php"><img class="tableWeatherIcons" src="../img/bottommenu/wohnzimmer01.png"></a>
  <a href="datenesp8266_schlafzimmer.php"><img class="tableWeatherIcons" src="../img/bottommenu/schlafzimmer01.png"></a>
  <a href="datenesp8266_bad.php"><img class="tableWeatherIcons" src="../img/bottommenu/bad01.png"></a>
  <a href="datenesp8266_kueche.php" class="active"><img class="tableWeatherIcons" src="../img/bottommenu/kueche01.png"></a>
  <a href="datenesp8266_flur.php"><img class="tableWeatherIcons" src="../img/bottommenu/flur01.png"></a>
</div>
</body>
</html>