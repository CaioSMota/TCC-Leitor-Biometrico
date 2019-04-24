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

#define I2C_ADDR    0x27  // Define I2C Address where the PCF8574A is
#define BACKLIGHT_PIN     3
#define En_pin  2
#define Rw_pin  1
#define Rs_pin  0
#define D4_pin  4
#define D5_pin  5
#define D6_pin  6
#define D7_pin  7

LiquidCrystal_I2C  lcd(0x27,En_pin,Rw_pin,Rs_pin,D4_pin,D5_pin,D6_pin,D7_pin);

SoftwareSerial mySerial(D3, D4);

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);

uint8_t id;
String fn="                ";

void setup()  
{

  lcd.begin (16,2);
  lcd.setBacklightPin(BACKLIGHT_PIN,POSITIVE);
  lcd.setBacklight(HIGH);
  lcd.home ();                   // go home
  delay(2000);

  Serial.begin(9600);
  while (!Serial);  
  delay(100);
  Serial.println("\n\nAdafruit Fingerprint sensor enrollment");

  // Definir a taxa de dados para a porta serial do sensor
  finger.begin(57600);

  //Arduino tentando encontrar o sensor de leitura digital
  if (finger.verifyPassword()) {
    Serial.println("Sensor de impressão digital encontrado!");
  } else {
    Serial.println("Sensor de impressão digital não encontado");
    while (1) { delay(1); }
  }
}

uint8_t readnumber(void) {
  uint8_t num = 0;
  
  while (num == 0) {
    while (! Serial.available());
    num = Serial.parseInt();
  }
  return num;
}

String id2;
void inicio() {
  lcd.setCursor ( 0, 0 );
  lcd.print("Digite um ID  ");
  lcd.setCursor ( 0, 1 );  
  lcd.print("Para a Leitura");

}
void fim() {
  lcd.setCursor ( 0, 0 );
  lcd.print(fn);
  lcd.setCursor ( 0, 1 );  
  lcd.print("                ");

}

void loop()           
{
  fim();
  delay(3000);
  inicio();
  Serial.println("Pronto para registrar uma impressão digital!");
  Serial.println("Por favor, digite o ID # (de 1 a 127) que você deseja salvar este dedo como...");

  //leitura do ID para leitura
  id = readnumber();
  
  if (id == 0) {// ID #0 not allowed, try again!
     return;
  }
  
  Serial.print("Cadastrando ID #");
  Serial.println(id);
  id2 = String(id);
  while (!  getFingerprintEnroll() );
  
  
}

//Metodo do LCD
void leitura() {
  lcd.setCursor ( 0, 0 );
  lcd.print("Leitura ID# ");
  lcd.print(id2);   
  lcd.setCursor ( 0, 1 );  
  lcd.print("Aparelho Ligado");
}  



//Leitura de Digital
uint8_t getFingerprintEnroll() { 
  
  //Apresentar no LCD
  leitura();

  //ID
  int p = -1;
  Serial.print("Coloque o Dedo no aparelho para o cadastro da Leitura Digital #"); Serial.println(id);
  Serial.println(id2);

  
  //Primeira leitura da Digital
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Coletada");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro de Imagem");
      break;
    default:
      Serial.println("Erro Desconhecido");
      break;
    }
  }

  // OK success!

  //Conversao da primeira leitura da Digital
  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Imagem Muito Confusa");
      fn="Erro CMC       "; 
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      fn="Erro CC       ";  
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
      fn="Erro CRI       ";  
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
       fn="Erro CRID      "; 
      return p;
    default:
      Serial.println("Erro Desconhecido");
      fn="Erro CDC        ";  
      return p;
  }
  
  Serial.println("Remove finger");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  Serial.print("ID "); Serial.println(id);
  p = -1;
  Serial.println("Place same finger again");
  
  //Segunda Leitura da Digital
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image Coletada");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.print(".");
      break;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      break;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro na imagem");
      break;
    default:
      Serial.println("Erro Desconhecido");
      break;
    }
  }

  // OK success!

  //Conversao da segunda leitura
  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
     Serial.println("Imagem Convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Imagem Muito Confusa");
      fn="Erro CMC      ";  
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro de Comunicacao");
      fn="Erro CC       ";  
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
      fn="Erro CRI      ";  
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Não foi possível encontrar recursos de impressão digital");
       fn="Erro CRID     ";  
      return p;
    default:
      Serial.println("Erro Desconhecido");
      fn="Erro CDC      ";  
      return p;
  }
  
  // OK converted!
  Serial.print("Creating model for #");  Serial.println(id);

  //Montando padrao das leituras
  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    Serial.println("Imagens Combinadas!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro de Comunicacao");
    fn="Erro TMC          "; 
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    Serial.println("As impressões digitais não correspondem");
    fn="Erro TM          ";  
    return p;
  } else {
    Serial.println("Erro Desconhecido");
    fn="Erro TMDC         ";  
    return p;
  }   

  
  Serial.print("ID "); Serial.println(id);
  p = finger.storeModel(id);

  //Armazenando na Memoria Flash
  if (p == FINGERPRINT_OK) {
    Serial.println("Armazenado!");
    fn="Armazenado!    ";
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro de Comunicacao");
    fn="Erro AMC         ";
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Não foi possível armazenar na memoria");
    fn="Erro AML         ";
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Erro ao gravar no flash");
    fn="Erro AMFL        ";
    return p;
  } else {
    Serial.println("Erro Desconhecido");
    fn="Erro AMDC     ";
    return p;
  }
    
}
