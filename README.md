# Wetter-Raumklima-Essen

Hier ist mein Projekt, welches in abgewandelter Form so bei mir zuhause auf einem Webserver läuft.
Abgewandelt deswegen, weil ich rechtlich auf der sicheren Seite sein wollte und einige JPG und PNG Dateien
vor dem upload gelöscht habe. (Siehe JavaScript-Code in der index.php)
Des weiteren habe ich alle grafischen Darstellungen des Klimaverlaufs in den Dateien im Ordner "wetter" gelöscht,
da diese von einem Drittanbieter stammten.

Das Design der Seite durch die CSS-Datei ist bisher eher MOBILE-FIRST, da ich das ausschließlich so nutze.

# Das ganze Konzept:

Wetterdaten von der nächstgelegenen Wetterstation werden bei Aufruf der Seite über openweathermap.org abgerufen.
Wetterdaten von der nächstgelegenen Wetterstation werden halbstündlich über openweathermap.org abgerufen
und in einer Datenbank gespeichert.
Raumklimadaten der einzelnen Räume werden mittels Sensor(DHT22), der an einem ESP 8266 hängt, halbstündlich abgerufen
und in einer Datenbank gespeichert.
