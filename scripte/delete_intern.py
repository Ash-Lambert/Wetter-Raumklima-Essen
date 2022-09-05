#!/usr/bin/python
import mysql.connector as mariadb

mariadb_connection = mariadb.connect(host = "HOST", user = "NAME", passwd = "PASSWORT", db = "DATENBANK")
curs = mariadb_connection.cursor()

try:
    curs.execute ("DELETE FROM bad LIMIT 48;")
    curs.execute ("DELETE FROM flur LIMIT 48;")
    curs.execute ("DELETE FROM schlafzimmer LIMIT 48;")
    curs.execute ("DELETE FROM wohnzimmer LIMIT 48;")
    curs.execute ("DELETE FROM kueche LIMIT 48;")
    curs.execute ("DELETE FROM draussen LIMIT 48;")
    mariadb_connection.commit()
    mariadb_connection.close()
except:
    mariadb_connection.close()