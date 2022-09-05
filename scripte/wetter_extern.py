#!/usr/bin/python
import json
import requests
from datetime import datetime
import mysql.connector as mariadb

mariadb_connection = mariadb.connect(host = "HOST", user = "NAME", passwd = "PASSWORT", db = "DATENBANK")
curs = mariadb_connection.cursor()

Response = requests.get("http://api.openweathermap.org/data/2.5/weather?id=MY_LOCATION&appid=MY_ID")
weatherData = Response.json()

description = weatherData['weather'][0]['id']
temp = weatherData['main']['temp'] - 273.15
gefuehlt = weatherData['main']['feels_like'] - 273.15
luftdruck = weatherData['main']['pressure']
luftfeuchte = weatherData['main']['humidity']
visibility = weatherData['visibility']
windspeed = weatherData['wind']['speed'] * 3.6
windrichtung = weatherData['wind']['deg']
windspitze = weatherData['wind']['gust']
wolken = weatherData['clouds']['all']
datumzeit = weatherData['dt']
zeitzone = weatherData['timezone']

temp = round(temp, 1)
gefuehlt = round(gefuehlt, 1)
windspeed = round(windspeed, 1)
windspitze = round(windspitze, 1)
real_time = datumzeit + zeitzone

datetime_obj = datetime.utcfromtimestamp(int(real_time))
edatum = datetime_obj.strftime("%y.%m.%d")
ezeit = datetime_obj.strftime("%H:%M:%S")

curs.execute ("INSERT INTO extern (datum, zeit, description, temp, feels_like, humi, pressure, visibility, windspeed, direction, wind_gust, cloudiness, erfassungsdatum, edatum, ezeit) VALUES (CURRENT_DATE(), NOW(), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s);",(description, temp, gefuehlt, luftfeuchte, luftdruck, visibility, windspeed, windrichtung, windspitze, wolken, datumzeit, edatum, ezeit))
mariadb_connection.commit()
mariadb_connection.close()