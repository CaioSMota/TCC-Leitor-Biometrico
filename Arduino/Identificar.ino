#include <U8g2lib.h>
#include <U8x8lib.h>
#include <Adafruit_Fingerprint.h>
#include <Arduino.h>
#include <U8g2lib.h>
#include <ESP8266WiFi.h>
#include <SPI.h>
#include <Wire.h>
#include <SoftwareSerial.h>
#include <WiFiClient.h>
#include <LCD.h>
#include <LiquidCrystal_I2C.h>

#define I2C_ADDR    0x27  
#define BACKLIGHT_PIN     3
#define En_pin  2
#define Rw_pin  1
#define Rs_pin  0
#define D4_pin  4
#define D5_pin  5
#define D6_pin  6
#define D7_pin  7
#define GreenLed  D5
#define RedLed  D6

int status = WL_IDLE_STATUS;

const char* ssid = "Caio";
const char* password = "12345678";

IPAddress ip(192, 168, 43, 112);

IPAddress gateway(192, 168, 43, 1);

IPAddress subnet(255, 255, 255, 0);

const char* host = "192.168.43.72";
const int httpPort = 80;

WiFiClient client;

LiquidCrystal_I2C  lcd(0x27,En_pin,Rw_pin,Rs_pin,D4_pin,D5_pin,D6_pin,D7_pin);

SoftwareSerial mySerial(D3, D4);

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

void setup()  
{ 
  
  WiFi.config(ip, gateway, subnet);
  WiFi.begin(ssid,password);

  while (WiFi.status() != WL_CONNECTED) {
    Serial.println("Connectando");
    delay(500);
  }
  
  Serial.println("Connected to wifi");



   pinMode(GreenLed, OUTPUT);  // set pin 4 as output. green LED connected
   pinMode(RedLed, OUTPUT);  // set pin 5 as output. red LED connected
  
  lcd.begin (16,2);
  lcd.setBacklightPin(BACKLIGHT_PIN,POSITIVE);
  lcd.setBacklight(HIGH);
  lcd.home ();                   // go home

  
  Serial.begin(9600);
  while (!Serial);  
  delay(100);
  Serial.println("\n\nAdafruit finger detect test");

  // Definir a taxa de dados para a porta serial do sensor
  finger.begin(57600);
  
   //Arduino tentando encontrar o sensor de leitura digital
  if (finger.verifyPassword()) {
    Serial.println("Sensor de impressão digital encontrado!");
  } else {
    Serial.println("Sensor de impressão digital não encontado");
    while (1) { delay(1); }
  }

  finger.getTemplateCount();
  Serial.print("Sensor contém "); Serial.print(finger.templateCount); Serial.println(" templates");
  Serial.println("Esperando pela Leitura...");
  digitalWrite(RedLed, HIGH);
}

void loop()                     // run over and over again
{
  lcd.setCursor ( 0, 0 );
  lcd.print("Esperando        ");
  lcd.setCursor ( 0, 1 );  
  lcd.print( "Leitura...      ");
  getFingerprintIDez();
  delay(3000);    
  digitalWrite(GreenLed, LOW);
  digitalWrite(RedLed, HIGH);        
}

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Coletada!");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("Nenhum imagem detectado");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imagem Erro");
      return p;
    default:
      Serial.println("Erro Desconhecido");
      return p;
  }

  // OK success!

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Imagem Confusa");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
      return p;
    default:
      Serial.println("Erro Desconhecido");
      return p;
  }
  
  // OK converted!
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Digital Encontrada!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro de Comunicacao");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) { 
    Serial.println("Digital nao encotrada");
    return p;
  } else {
    Serial.println("Erro Desconhecido");
    return p;
  }   
  
  // found a match!
  Serial.print("Digital do ID #"); Serial.print(finger.fingerID); 
  Serial.print(" com confiança de "); Serial.println(finger.confidence); 

  return finger.fingerID;
}

void fim() {
  lcd.setCursor ( 0, 0 );
  lcd.print("Bem Vindo!      ");
  lcd.setCursor ( 0, 1 );  
  lcd.print("ID#             ");
  lcd.setCursor ( 4, 1 );
  lcd.print(finger.fingerID);
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;
    fim();
    digitalWrite(GreenLed, HIGH);  //turn on green LED and Relay if finger ID is match
    digitalWrite(RedLed, LOW);  //red LED is OFF

  Serial.print("Digital do ID #"); Serial.print(finger.fingerID); 
  Serial.print(" com confiança de "); Serial.println(finger.confidence);
  
  EnviarDados();
  FecharConexao();
  
  return finger.fingerID; 
}


void EnviarDados(){
  Serial.print("connecting to ");
  Serial.println(host);

  if (!client.connect(host , httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  String StartUrl = "/tccFinal/Presenca.php?id="+String(finger.fingerID);
  Serial.print("Requesting URL: ");
  Serial.println(StartUrl);
  client.print("GET " + StartUrl + " HTTP/1.1\r\n" +
  "Host: " + host + "\r\n" +
  "Connection: close\r\n\r\n");
  client.println();
  Serial.println("Started");
}

void FecharConexao(){
  Serial.print("connecting to ");
  Serial.println(host);
  
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  String StopUrl = (String)host + "/tccFinal/Presenca.php";
  Serial.print("Requesting URL: ");
  Serial.println(StopUrl);
  client.print("GET " + StopUrl + " HTTP/1.1\r\n" +
  "Host: " + host + "\r\n" +
  "Connection: close\r\n\r\n");
  Serial.println("Finished");
}
