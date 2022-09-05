<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title>Essen Auswahl</title>
<link rel="shortcut icon" href="../icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/newstyle.css">
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
		<li><a href="../wetter/datenextern.php">Bad Nauheim</a></li><hr>
		<li><a href="../wetter/datenesp8266_draussen.php">Draussen</a></li><hr>
		<li><a href="../wetter/sonneaufunter.php">Sunrise/set</a></li><hr>
		<li><a href="../wetter/history_extern.php">Historie</a></li>
      </ul>
      </li>
	  <li class="submenu"><a href="#">Wetter intern</a><svg class="dropdownbutton" height="12" width="20">
  <polygon points="0,0 6,6,0 12" style="fill:white;stroke:black;stroke-width:1" />
</svg><hr>
      <ul>
		<li><a href="../wetter/datenesp8266_wohnzimmer.php">Wohnzimmer</a></li><hr>
		<li><a href="../wetter/datenesp8266_schlafzimmer.php">Schlafzimmer</a></li><hr>
		<li><a href="../wetter/datenesp8266_kueche.php">Küche</a></li><hr>
		<li><a href="../wetter/datenesp8266_bad.php">Bad</a></li><hr>
		<li><a href="../wetter/datenesp8266_flur.php">Flur</a></li><hr>
		<li><a href="../wetter/history_intern.php">Historie</a></li>
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
	  <li><a href="index.php">Essen</a></li><hr>
      <li><a href="../mischen/index.htm">Sirup</a></li><hr>
	  <li><a href="../popqorn/index.htm" target="_blank">Popqorn</a></li>
    </ul>
</nav><br>
<p class='wettertabelleueberschrift'>Rezepte</p><hr>
<br>
<p class='rezepttext'>Gericht wählen:</p>
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
<select class="essenbutton" name="essen">
 <?php
$con = mysqli_connect(("HOST", "NAME", "PASSWORT", "DATENBANK");
    $sql = "SELECT gericht_ID, name FROM gericht;";
    $res = mysqli_query($con, $sql);
	
		echo '<option value="0">Bitte wählen..</option>';
        while($row = mysqli_fetch_assoc($res)) {
		echo "<option value='" . $row['gericht_ID'] . "'>" . $row['name'] . "</option>";
		}
?> 
</select>
<br><br>
   <p><input type="submit" class="essensuchenbutton" value="Suchen"></p>
   </form>
<br>
<?php
   $con = mysqli_connect("HOST", "NAME", "PASSWORT", "DATENBANK");
   $sql = "SELECT gericht.name, gericht.rezepttext, mengen.menge, einheiten.einheit, zutaten.zutat, zusatztexte.zusatztext, kategorien.kategorie
	FROM gericht
	INNER JOIN zwischen ON zwischen.fk_gericht_id = gericht.gericht_id
	INNER JOIN mengen ON mengen.mengen_id = zwischen.fk_mengen_id
	INNER JOIN einheiten ON einheiten.einheiten_id = zwischen.fk_einheiten_id
	INNER JOIN zutaten ON zutaten.zutaten_id = zwischen.fk_zutaten_id
	INNER JOIN zusatztexte ON zusatztexte.zusatztexte_id = zwischen.fk_zusatztexte_id
    INNER JOIN kategorien ON kategorien.kategorien_id = zwischen.fk_kategorien_id
	WHERE gericht.gericht_id = '" . $_POST["essen"] . "%'
	ORDER BY zutaten.zutaten_id;";

	$sql2 = "SELECT gericht.rezepttext
	FROM gericht
	WHERE gericht.gericht_id = '" . $_POST["essen"] . "%';";
	
	$sql3 = "SELECT DISTINCT gericht.name, zusatztexte.zusatztext, kategorien.kategorie
	FROM gericht
	INNER JOIN zwischen ON zwischen.fk_gericht_id = gericht.gericht_id
	INNER JOIN zusatztexte ON zusatztexte.zusatztexte_id = zwischen.fk_zusatztexte_id
    INNER JOIN kategorien ON kategorien.kategorien_id = zwischen.fk_kategorien_id
	WHERE gericht.gericht_id = '" . $_POST["essen"] . "%';";
	
	$res3 = mysqli_query($con, $sql3);
		while ($dsatz3 = mysqli_fetch_assoc($res3))
		{
		echo "<h2>" . $dsatz3["name"] . "</h2>";
		echo "<h3>" . $dsatz3["zusatztext"] . "</h3>";
		echo "<h3>" . $dsatz3["kategorie"] . "</h3><br>";
		}

   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   
		if($num > 0) echo "<table class='zutatentabelle'>";
		if($num > 0) echo "<th class='td' colspan='3'>Zutaten:</th>";

		$lf = 1;
		while ($dsatz = mysqli_fetch_assoc($res))
		{
		echo "<tr>";
		echo "<td>" . $dsatz["menge"] . "</td>";
		echo "<td>" . $dsatz["einheit"] . "</td>";
		echo "<td>" . $dsatz["zutat"] . "</td>";
		echo "</tr>";
		$lf = $lf + 1;
		}
		echo "</table>";
   
   $res2 = mysqli_query($con, $sql2);
		while ($dsatz2 = mysqli_fetch_assoc($res2))
		{
		echo "<br>";
		echo "<p class='rezepttext'>" . $dsatz2["rezepttext"] . "</p>";
		}

   mysqli_close($con);
?>
</body>
</html>
