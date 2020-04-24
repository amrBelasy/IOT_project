String Request;   // for incoming serial data

//-----------------------------//
#include <WiFi.h>
#include <ArduinoJson.h>
#define RXD2 16
#define TXD2 17
String headerData;//header of data from serial
 int moduleNumber= 1;
 ////
float totaltime,startTime,endTime;
////
char ssidME[] = "ESP_1";           // SSID of your AP
char ssid2[] = "ESP_2"; 
char pass[] = "esp12345";
String idToConnect="";
////
String datafromstation="";
/////
int port = 80;
IPAddress IP_Server(192,168,4,15);
IPAddress mask = (255, 255, 255, 0);
WiFiServer server(port);
WiFiClient client;
int Type = 0; //0=AP 1=S
////
//int recived=10;//10=from server  20=to server
////variable for sensors
int Separator;
String dataFromPrevious,header;
 int volt1,volt2,volt3;
  float temp;
  float RawData,RawDatainMilli,celsius;
  int Lm35PIN=13;
  String sensoredData,sensoredDatag,ResponsedData;
//// for led control
int brightness = 0;    // how bright the LED is
int fadeAmount = 5;    // how many points to fade the LED by
int ledPin = 21;
const int freq = 255;
const int ledChannel = 0;
const int resolution = 8; //duty cycle 0 to 255(2^8)
 String Buffer="";//buffer go store data to ssend serially
 String SendCommandtoNext; //variable check if weit will send to next

///
DynamicJsonBuffer  jsonBuffer(200);
char buffers[200];   


///----------------------------------//

void setup() {
        
        Serial.begin(115200);
        Serial2.begin(115200,SERIAL_8N1,RXD2,TXD2);
        setupSensor();// opens serial port, sets data rate to 9600 bps
        setupcom();
          
}

void loop() {

        // send data only when you receive data:
        if (Serial2.available() > 0)
        {
                // read the incoming byte:
                Request = Serial2.readString();
              int Separator2 = Request.indexOf('#');
             //String header=Request.substring(0,Separator2);
              headerData=Request.substring(0,Separator2);
             //Serial.println("Request "+Request);
            // Serial.println("headerData "+headerData);
                startTime=micros();
                // say what you get:
                Serial.print("I received :  ");
                Serial.println(Request);
               if(Request=="c")
               {
                Serial.println("I will Send to other modules to get their data ");
                Type=1;//station
                setupcom();
               }else if(Request=="10")
               {
                Serial.println("this defult number from serial ");
                 //}else if(header=="d")//this commend from serial to control led
                }else if(headerData=="d")//this commend from serial to control led
               {
                Serial.println("header : "+headerData);
               Serial.println("this commend from serial to control led i will check it if it for me");
               String dataFromSerial=Request.substring(Separator2+1);
                jsonsetup(dataFromSerial);
                Serial.println("SendCommandtoNext "+SendCommandtoNext);
                SendCommandtoNext=="False";
          ///----------------------------44444
               }else { 
                  Serial.println("no case to handel this request");
             }
             }


//---------------------------------//
  if(Type==0){
  // AP mode 
      WiFiClient client = server.available();
      if (!client) {return;}
       datafromstation = client.readStringUntil('\r');
      client.println("ACK\r");
      Serial.println("*--------- From Station-----------*");
      Serial.println(datafromstation);
     // if(datafromstation.length()>20){
        Separator = datafromstation.indexOf('#');
        header=datafromstation.substring(0,Separator);
       if(header=="100"){
        dataFromPrevious=datafromstation.substring(Separator+1);
        Serial.println("header : "+header);
        //Serial.println("dataFromPrevious : "+dataFromPrevious);
        String AllData=FormatOfMyData(dataFromPrevious);
       Serialloop(AllData);
        Serial.println("Total Collected Data :  "+AllData);
        int size=AllData.length();
        Serial.print("Total Data length :");
         Serial.println(size);            
       // Type = 1;             
      }else if(datafromstation=="GET / HTTP/1.1")
      {
        Serial.println("Request from outer I will reject it");
        WiFi.softAPdisconnect(true);
      }else
       {
          Serial.println("Data Recived : "+datafromstation);
          endTime=micros();
          //Serial.print(" Total Time To Collect Data :" );
          Serial.println(endTime-startTime);
           Serial.print("Total Time To Collect Data in seconds :" );
           totaltime=(endTime-startTime)/(1000000);
           Serial.println(totaltime);
       }
      datafromstation="";
      client.flush();
       Serial.println("----------------------------");
      Type = 0;
      setupcom();
  }else{
    //station mode
    Serial.println("Header "+header);
    Serial.println("Request "+Request);
      
      client.connect(IP_Server, port);   
      Serial.println("*************");
     if(Request=="c"){
      Serial.println("*-----Request sent to Next module---*");
      //Serial.println(client.println(Request+'\r'));
      
      client.println(Request+'\r');
      Serial.println("---------------");
     }else if(header=="100"){
     //else if(datafromstation.length()>20){
        String Response=FormatOfMyData(dataFromPrevious);
        Serial.println("Total Collected Data : ");
        Serial.println(Response);
        }else if(SendCommandtoNext=="True"){
          Serial.println("Forward this Command to Next pole "+SendCommandtoNext);
          client.println(Request+'\r');
        
        }
      String answer = client.readStringUntil('\r');
      Serial.println(answer);

      if(answer=="ACK")
      {
        Serial.println("Acknolagement Received");
      }else
        {
          Serial.println("NO Acknolagement Received");
        }
      client.flush();
      client.stop();
      delay(2000);    
      Type = 0;
      setupcom();
      datafromstation="";
     // header="";
      SendCommandtoNext="false";
  }
  
   header="";       
}//--------------------End Loop---------------

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<Method to use >>>>>>>>>>>>>>>>>>>>>>.
//////////////////////1- switch between two modes Ap & s ////////////////
void setupcom(){

// Serial.println ("direction of flow will be <><><><>--<><><>");
// Serial.println (recived);
  if(Type ==0){
    //////////////////////mode is acess point
    WiFi.mode(WIFI_AP);
    WiFi.softAP(ssidME, pass,1,true,2);
    //WiFi.softAP(ssidME, pass,channel,hidden==true,maxconnection==2);
    WiFi.softAPConfig(IP_Server, IP_Server, mask);
    
    
    server.begin();
    Serial.println("ESP_1 AP started.");
  }
  ///////////////////////mode is station 
  else{
    WiFi.mode(WIFI_STA);
   Serial.println("Esp_1 station started" );
      idToConnect="ESP_2";
      WiFi.begin(ssid2, pass);           // connects to the WiFi AP
      Serial.println();
      Serial.println("Try to connect the "+idToConnect);
      while (WiFi.status() != WL_CONNECTED) {
      Serial.print(".");
      delay(500);}
      Serial.println();
     Serial.println("Connection Done");
    }  
}
/////////////////////// 2-Get data from sensors ////////////////////
void setupSensor(){
    
  Serial.begin(115200);
  pinMode(15, INPUT);
  pinMode(12, INPUT);
  pinMode(4, INPUT);
  pinMode(13, INPUT); 
    
    }
  String loopSensor(){
   // Serial.println("My Data");
      // Serial.println("-------Voltage values-->");
  //volt1=analogRead(15);
  //volt1=map(volt1,0,4095,0,300);
  volt1=200;
 // Serial.print("volt1 =");
 // Serial.println(volt1);
  
  // volt2=analogRead(12);
  // volt2=map(volt2,0,4095,0,300);
  volt2=150;
  // Serial.print("volt2 = ");
  // Serial.println( volt2);
  
   //volt3= analogRead(4);
    //volt3=map(volt3,0,4095,0,300);
    volt3=170;
   // Serial.print("volt3 = ");
   // Serial.println(volt3);
   
    //Serial.println("------>");
    
    //Serial.println("------tempreature-->");

   // RawData=analogRead(Lm35PIN);
   // RawDatainMilli=RawData/1024.0;
   //celsius=RawDatainMilli/10;
     celsius=5;
    // Serial.print("celsius = ");
   // Serial.println(celsius);
   int battery =12;
//            analogRead(32);
   //         battery=map(volt1,0,4095,0,30);
      int solar_cell=17;
    //       analogRead(15);
   //        solar_cell=map(volt1,0,4095,0,300);
   int ledsensor=1;
   sensoredData="";
     sensoredData.concat("[{'pn':'");
     //sensoredData.concat("{pole_number:");
     sensoredData.concat(moduleNumber);
     sensoredData.concat("','v1':'");
     sensoredData.concat(volt1);
     sensoredData.concat("','v2':'"); 
     sensoredData.concat(volt2);
     sensoredData.concat("','v3':'");
     sensoredData.concat(volt3);
     sensoredData.concat("','temp':'");
     sensoredData.concat(celsius);
     sensoredData.concat("','B':'");
    sensoredData.concat(battery);
    sensoredData.concat("','sc':'");
    sensoredData.concat(solar_cell);
    sensoredData.concat("','ls':'"); 
   sensoredData.concat(ledsensor);
     sensoredData.concat("'},");
    //Serial.println("------>");
   // Serial.println(sensoredData);
    
   // delay(2400);
      
      return sensoredData;
      }

//////////////////////// 3-json formate of data to send ////////////////////
       String FormatOfMyData(String dataFromPrevious){
        ResponsedData="";
       // ResponsedData.concat("100");
       // ResponsedData.concat("#");
        
        // Serial.println("dataFromPrevious :" +dataFromPrevious);
        sensoredDatag= loopSensor();
        ResponsedData.concat(sensoredDatag);
         ResponsedData.concat(dataFromPrevious);
       // Serial.println("MysensoredData "+sensoredDatag);
        ResponsedData.concat('\r');
       // Serial.println("in Format of data method "+ResponsedData);
        dataFromPrevious="";
        return ResponsedData;
        }

   ///////////////4-led control code  ////////////////////////////////////   
 void ledcontrolsetup(){
          Serial.begin(115200);
          pinMode(ledPin,OUTPUT);    
  
         // configure LED PWM functionalitites
          ledcSetup(ledChannel, freq, resolution);
  
         // attach the channel to the GPIO2 to be controlled
           ledcAttachPin(ledPin, ledChannel);
        
          }
          
  void ledcontrolloop(int intensity){
              
             //int pwmValue = ledsignal.toInt();
               if(intensity>=0 & intensity<=255){
                // say what you get:
               // Serial.print("in led control I received :  ");
               // Serial.println(intensity);
                 //PWM Value varries from 0 to 1023  
                ledcWrite(ledChannel, intensity);
                // Serial.print("the value of  PWM now is : ");
                //  Serial.println(intensity);
               }else{
                
                Serial.print("the value out of range 0==255 :" );
                Serial.println(intensity);
                }
                 Type = 0;
                 setupcom();
        }


 //////////////// Json that represent command to perform ////

 
 //void jsonsetup(char json[]){
  void jsonsetup(String json){
      json.toCharArray(buffers,200); 
  // DynamicJsonBuffer  jsonBuffer(200);
    //Serial.print("in json setup ");
    // Serial.println(buffers);
    JsonObject& root = jsonBuffer.parseObject(buffers);

  // Test if parsing succeeds.
  if (!root.success()) {
    Serial.println("parseObject() failed");
    return;

  }
  
  
    int pole_number = root["pole_number"];
    Serial.print("pole_number ");
    Serial.println(pole_number);
    //if(pole_number == moduleNumber||pole_number==0)
    if(pole_number == moduleNumber)
    {
            //String Led_status = root["Led_status"];
        int Intensity = root["intensity"];
         Serial.println("Intensity "+Intensity);
         ledcontrolsetup();
        ledcontrolloop(Intensity);
        
       // String Led_Auto = root["Led_Auto"];
      //if(Led_Auto=="on"||Led_Auto=="ON")
      //{
      //Serial.println("I will make led perform with available state");
      //}
         Serial.print("Pole_number: ");
         Serial.println(pole_number);
         Serial.print("Intensity: ");
         Serial.println(Intensity);
         Serial.print("Led_Auto: ");
  } if(pole_number != moduleNumber){
      //Serial.println("this not command for me , i will send to next");
       SendCommandtoNext="True";
        int Intensity = root["intensity"];
         Serial.println("Intensity "+Intensity);
         ledcontrolsetup();
        ledcontrolloop(Intensity);
      Type = 1;
      setupcom();
  }
  
  ////////////////////////////////////
  if(pole_number==0){
     SendCommandtoNext="True";
      ledcontrolsetup();
      int Intensity = root["intensity"];
      ledcontrolloop(Intensity);
      Type = 1;
      setupcom();
    
    }
    ///////////////////////////////////
  }
  
  void Serialloop(String TotalData){
  Buffer="";
   Buffer.concat("s#");
   Buffer.concat(TotalData);
    Serial2.println(Buffer);
    //delay(1000);
    Serial.println("TotalData sent  ");
    
    }
            
