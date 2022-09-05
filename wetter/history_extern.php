<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Klimahistorie Extern</title>
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
  <p class='wettertabelleueberschrift'>Klimahistorie</p><hr>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(datum, '%d.%m.') AS datum, mintemp, maxtemp, avgtemp, minhumi, maxhumi, avghumi
    FROM minmax
    WHERE area = 'extern'
    ORDER BY id DESC LIMIT 14;");

   echo "<table class='wettertabelleBN'>";
   echo "<tr><th colspan='7'>Bad Nauheim</th></tr>";
   echo "<tr>
		<th><img class='tableWeatherIcons' src='../img/wetter/calendar02.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempmin01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempmax01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempavg01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humimin01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humimax01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humiavg01.png'></th>
		</tr>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . $dsatz["datum"] . "</td>";
	  $dsatz["mintemp"] = number_format($dsatz["mintemp"], 1);
	  echo "<td class='td'>" . $dsatz["mintemp"] . "</td>";
	  $dsatz["maxtemp"] = number_format($dsatz["maxtemp"], 1);
	  echo "<td class='td'>" . $dsatz["maxtemp"] . "</td>";
	  $dsatz["avgtemp"] = number_format($dsatz["avgtemp"], 1);
	  echo "<td class='td'>" . $dsatz["avgtemp"] . "</td>";
	  $dsatz["minhumi"] = number_format($dsatz["minhumi"], 1);
	  echo "<td class='td'>" . $dsatz["minhumi"] . "</td>";
	  $dsatz["maxhumi"] = number_format($dsatz["maxhumi"], 1);
	  echo "<td class='td'>" . $dsatz["maxhumi"] . "</td>";
	  $dsatz["avghumi"] = number_format($dsatz["avghumi"], 1);
	  echo "<td class='td'>" . $dsatz["avghumi"] . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br><br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $res = mysqli_query($con, "SELECT DATE_FORMAT(datum, '%d.%m.') AS datum, mintemp, maxtemp, avgtemp, minhumi, maxhumi, avghumi
    FROM minmax
    WHERE area = 'draussen'
    ORDER BY id DESC LIMIT 14;");

   echo "<table class='wettertabelleBN'>";
   echo "<tr><th colspan='7'>Draußen</th></tr>";
   echo "<tr>
		<th><img class='tableWeatherIcons' src='../img/wetter/calendar02.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempmin01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempmax01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/tempavg01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humimin01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humimax01.png'></th>
		<th><img class='tableWeatherIcons' src='../img/wetter/humiavg01.png'></th>
		</tr>";

   $lf = 1;
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
	  echo "<td class='td'>" . $dsatz["datum"] . "</td>";
	  $dsatz["mintemp"] = number_format($dsatz["mintemp"], 1);
	  echo "<td class='td'>" . $dsatz["mintemp"] . "</td>";
	  $dsatz["maxtemp"] = number_format($dsatz["maxtemp"], 1);
	  echo "<td class='td'>" . $dsatz["maxtemp"] . "</td>";
	  $dsatz["avgtemp"] = number_format($dsatz["avgtemp"], 1);
	  echo "<td class='td'>" . $dsatz["avgtemp"] . "</td>";
	  $dsatz["minhumi"] = number_format($dsatz["minhumi"], 1);
	  echo "<td class='td'>" . $dsatz["minhumi"] . "</td>";
	  $dsatz["maxhumi"] = number_format($dsatz["maxhumi"], 1);
	  echo "<td class='td'>" . $dsatz["maxhumi"] . "</td>";
	  $dsatz["avghumi"] = number_format($dsatz["avghumi"], 1);
	  echo "<td class='td'>" . $dsatz["avghumi"] . "</td>";
      echo "</tr>";
      $lf = $lf + 1;
   }
   echo "</table>";

   mysqli_close($con);
?>
<br>
</body>
</html>