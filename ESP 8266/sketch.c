#include <DHT.h>
#include <ESP8266WiFi.h>
#include <ESP.h>
 
WiFiClient client;
 
#define DHTPIN 2                          // SENSOR PIN
#define DHTTYPE DHT22                     // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
DHT dht(DHTPIN, DHTTYPE);
 
const char* ssid     = "SSID";
const char* password = "PASSWORT";
const char server[]  = "IP-ADDRESS";
 
void setup() {
 
  Serial.begin(9600);
  delay(100);
 
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(100);
    Serial.print("."); }
    
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP()); }

void loop() {
 
  //DHT Messung
  
  dht.begin();
  Serial.println("sensor inizialized");
  delay(7000);                           // GIVE THE SENSOR SOME TIME TO START
  
  float sensorTemp = dht.readTemperature();
  Serial.println("temperatur");
  float sensorHum = dht.readHumidity();
  Serial.println("luftfeuchtigkeit");
 
  Serial.println(sensorTemp);
  Serial.println(sensorHum);
  Serial.println("\nStarting connection to server...");
   
  //Gemessene Daten übertragen
   
  if (client.connect(server, 80)) {
    Serial.println("connected!!");
    //WiFi.printDiag(Serial);

    String data = "/wetter/esp8266_bad.php?areaplace=Bad&";
    data += "temp=";
    data += (String) sensorTemp;
    data += "&humi="; 
    data += (String) sensorHum;
   
    Serial.println(data);
 
    client.print(String("GET ") + data + " HTTP/1.1\r\n" +
                        "Host: " + server + "\r\n" +
                        "Connection: close\r\n\r\n");
    client.stop(); }

    delay(1792920);
   }