<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Sonnenaufgang - Sonnenuntergang</title>
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
<p class='wettertabelleueberschrift'>Sonnenaufgang - Sonnenuntergang</p><hr>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(datum, '%d.%m.') AS datum, DATE_FORMAT(sunrise, '%H:%i') AS sunrise, DATE_FORMAT(sunset, '%H:%i') AS sunset FROM sunrisesunset ORDER BY id DESC LIMIT 49;");

   echo "<table class='wettertabelle'>";
   echo "<tr>
		<th><img class='tableWeatherIcons' src='../img/wetter/temperatur02.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/sonnenaufgang03.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/sonnenuntergang03.png'></th>
		</tr>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . $dsatz["datum"] . "</td>";
	  echo "<td class='td'>" . $dsatz["sunrise"] . "</td>";
	  echo "<td class='td'>" . $dsatz["sunset"] . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br>
</body>
</html>

