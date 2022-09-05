#!/usr/bin/python
import json
import requests
from datetime import datetime
import mysql.connector as mariadb

mariadb_connection = mariadb.connect(host = "HOST", user = "NAME", passwd = "PASSWORT", db = "DATENBANK")
curs = mariadb_connection.cursor()

Response = requests.get("http://api.openweathermap.org/data/2.5/weather?id=MY_LOCATION&appid=MY_ID")
weatherData = Response.json()

sonneauf = weatherData['sys']['sunrise']
sonneunter = weatherData['sys']['sunset']
zeitzone = weatherData['timezone']

sonneauf = sonneauf + zeitzone
sonneunter = sonneunter + zeitzone

datetime_obj = datetime.utcfromtimestamp(int(sonneauf))
sunrise = datetime_obj.strftime("%H:%M:%S")

datetime_obj = datetime.utcfromtimestamp(int(sonneunter))
sunset = datetime_obj.strftime("%H:%M:%S")

curs.execute ("INSERT INTO sunrisesunset (datum, sunrise, sunset) VALUES (CURRENT_DATE(), %s, %s);",(sunrise, sunset))
mariadb_connection.commit()
mariadb_connection.close()