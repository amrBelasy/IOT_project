

//modules in the middle
#include <WiFi.h>
#include <ArduinoJson.h>
#define RXD2 16
#define TXD2 17
int moduleNumber=2;
char ssidME[] = "ESP_2";           // SSID of your AP
char ssid1[] = "ESP_1"; 
char ssid3[] = "ESP_3"; 
char pass[] = "esp12345";
String idToConnect="";
int port = 80;
IPAddress IP_Server(192,168,4,15);
IPAddress mask = (255, 255, 255, 0);
WiFiServer server(port);
WiFiClient client;
int Type = 0; //0=AP 1=S
String Request;//99=from server  100=to server 
//variable for sensors
int Separator;
String dataFromPrevious,header;
int volt1,volt2,volt3;
  float temp;
  float RawData,RawDatainMilli,celsius,fahrenheit;
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


void setup() {
  
  // put your setup code here, to run once:
 Serial.begin(115200);
 setupSensor();
 setupcom();
}

void loop() {
  // put your main code here, to run repeatedly:

 if(Type==0){//mode is acess point 
 // SendCommandtoNext=="False";
      WiFiClient client = server.available();
      if (!client) {return;}
       Request = client.readStringUntil('\r');
       //////////////////////////////////////////////////               
       client.println("ACK\r");
       Serial.println("***************Data From Station*****************");
       Serial.println(Request);
         if(Request=="c"){//send request to other modules to get their data
         Serial.println("I will Send to other modules to get their data ");
                Type = 1;//sation
                 setupcom();
                client.println(Request+"\r");         
     }else if(Request=="GET / HTTP/1.1")
      {
        Serial.println("Request from outer I will reject it");
        WiFi.softAPdisconnect(true);
         Type = 0;//Ap
         setupcom();
      }else{
       Separator = Request.indexOf('#');
        header=Request.substring(0,Separator);
        Serial.println("header= "+header);
     
     if(header=="100"){
      SendCommandtoNext=="False";
        dataFromPrevious=Request.substring(Separator+1);
        Serial.println("dataFromPrevious : "+dataFromPrevious);                
        Type = 1;
        setupcom();             
      }else if(header=="d"){
        Serial.println("this commend from server to control led i will check it if it for me");
        dataFromPrevious=Request.substring(Separator+1);
         Serial.println("dataFromPrevious : "+dataFromPrevious);
          jsonsetup(dataFromPrevious);
         // SendCommandtoNext=="False";
           Serial.print("SendCommandtoNext "+SendCommandtoNext);
             Serial.println(SendCommandtoNext);    
      }else{
         Type = 0;//Ap
        setupcom();
        Serial.println("can't deal with this request");
        }
      //else if(header=="100")//this is data from modules befor you
               
               // { 
                 // Type = 1;//sation
                  //Serial.println("data recived"+dataFromPrevious);
                  
                  // Client.println(Request+"\r")
                //}
              //  else{
                //  Serial.println("this request for me and no need to send to other");
                //  }
       
      
      Serial.println("********************************");
      client.flush();
      //delay(3000);   
     }
  }else{//mode is sation 
      client.connect(IP_Server, port); 
     // header=Request.substring(0,Separator);  
      Serial.println("********************************");
     Serial.println("Request " +  Request);
     Serial.println("header " +  header);
     Serial.println("SendCommandtoNext" +  SendCommandtoNext);
        if(Request=="c"){
      Serial.println("-----#Data sent to Next module--->");
      //Serial.println(client.println(Request+'\r'));
      
      client.println(Request+'\r');
      Serial.println("-------->");
     }else if(header=="100"){
       //if(Request.length()>20){
        String Response=FormatOfMyData(dataFromPrevious);
        client.println(Response);
        }else if(SendCommandtoNext=="True"){
          SendCommandtoNext=="False";
          Serial.println("SendCommandtoNext "+SendCommandtoNext);
          client.println(Request+'\r');
        
        }
      
      String answer = client.readStringUntil('\r');
      Serial.println("Answer"+answer);
    if(answer=="ACK")
      {
        Serial.println("Acknolagement Received");
      }else 
        {
          Serial.println("NO Acknolagement Received");
        }
      client.flush();
      client.stop();
      //delay(2000);    
      Type = 0;
      setupcom();
      header="";
      SendCommandtoNext="false";
      
  }
   //header="";
      //SendCommandtoNext="false";

}
void setupcom(){
  if(Type ==0){
    //////////////////////mode is acess point
    WiFi.mode(WIFI_AP);
    WiFi.softAP(ssidME, pass,1,true,2);
    WiFi.softAPConfig(IP_Server, IP_Server, mask);
    server.begin();
    Serial.println("ESP_2 AP started.");
  }
  ///////////////////////mode is station 
  else{
    WiFi.mode(WIFI_STA);
     Serial.println("Esp_2 station started" );
    if(Request=="c"|| SendCommandtoNext=="True")
    {
      Serial.println("Request in setupcom "+Request);
      Serial.println("SendCommandtoNext in setupcom "+SendCommandtoNext);
     SendCommandtoNext=="False";
      idToConnect="ESP_3";
      WiFi.begin(ssid3, pass);           // connects to the WiFi AP

    }else if(header=="100"){
     Serial.println("in setupcomp header = "+header);

      idToConnect="ESP_1";
      WiFi.begin(ssid1, pass); // connects to the WiFi AP
     // header="";
      }
      Serial.println();
      Serial.println("try to connect the "+idToConnect);
      while (WiFi.status() != WL_CONNECTED) {
      Serial.print(".");
      delay(500);
      
    }
    Serial.println();
    Serial.println("Connection Done");
      }
       
  
  }
  void setupSensor(){
    
  Serial.begin(115200);
  pinMode(15, INPUT);
  pinMode(12, INPUT);
  pinMode(4, INPUT);
  pinMode(13, INPUT); 
    
    }
  String loopSensor(){
       Serial.println("-------Voltage values-------------------->");
  //volt1=analogRead(15);
  //volt1=map(volt1,0,4095,0,300);
  volt1=210;
  //Serial.print("volt1 =");
  //Serial.println(volt1);
  
  // volt2=analogRead(12);
  // volt2=map(volt2,0,4095,0,300);
  volt2=200;
  // Serial.print("volt2 = ");
   //Serial.println( volt2);
  
   //volt3= analogRead(4);
    //volt3=map(volt3,0,4095,0,300);
    volt3=230;
   // Serial.print("volt3 = ");
    //Serial.println(volt3);
   
   // Serial.println("------------------>");
    
    //Serial.println("-------------tempreature-------------->");

   // RawData=analogRead(Lm35PIN);
   // RawDatainMilli=RawData/1024.0;
   //celsius=RawDatainMilli/10;
     celsius=5;
     //Serial.print("celsius = ");
    //Serial.println(celsius);
   // String battery =analogRead(32);
   // battery=map(volt1,0,4095,0,30);
    //String solar_cell=analogRead(15);
   // solar_cell=map(volt1,0,4095,0,300);
    sensoredData="";
    sensoredData.concat("{'pole_number':'");
    sensoredData.concat(moduleNumber);
    sensoredData.concat("','line1volt':'");
    sensoredData.concat(volt1);
    sensoredData.concat("','line2volt':'"); 
    sensoredData.concat(volt2);
    sensoredData.concat("','line3volt':'");
    sensoredData.concat(volt3);
    sensoredData.concat("','temperature':'");
    sensoredData.concat(celsius);
  //  sensoredData.concat("','battery':'");
   // sensoredData.concat(battery);
  //   sensoredData.concat("','solar_cell':'");
 //   sensoredData.concat(solar_cell);
    sensoredData.concat("'}");
    //Serial.println("------------------>");
    //Serial.println(sensoredData);
    
   // delay(2400);
      
      return sensoredData;
      }
    String FormatOfMyData(String dataFromPrevious){
       ResponsedData="";
        ResponsedData.concat("100");
        ResponsedData.concat("#");
         Serial.println("dataFromPrevious :" +dataFromPrevious);
        sensoredDatag= loopSensor();
        ResponsedData.concat(sensoredDatag);
        ResponsedData.concat(dataFromPrevious);
       // Serial.println("MysensoredData "+sensoredDatag);
        ResponsedData.concat('\r');
        Serial.println("in Format of data method "+ResponsedData);
        return ResponsedData;
        }

        //////////++++++++++++++++++
        
   ///////////////4-led control code  ////////////////////////////////////   
 void ledcontrolsetup(){
          Serial.begin(115200);
          pinMode(ledPin,OUTPUT);
         // pinMode(19,OUTPUT);
          // pinMode(18,OUTPUT);
           // pinMode(5,OUTPUT);
            // pinMode(36,OUTPUT);
             //   pinMode(39,OUTPUT);
              //   pinMode(34,OUTPUT);
               //   pinMode(35,OUTPUT);
                //   pinMode(32,OUTPUT);
                 //   pinMode(25,OUTPUT);
                  //   pinMode(26,OUTPUT);
                   //   pinMode(14,OUTPUT);
                    //   pinMode(12,OUTPUT);
                     //   pinMode(13,OUTPUT);
                      //   pinMode(4,OUTPUT);
                       //   pinMode(2,OUTPUT);
                        //   pinMode(15,OUTPUT);
                           
  
         // configure LED PWM functionalitites
          ledcSetup(ledChannel, freq, resolution);
  
         // attach the channel to the GPIO2 to be controlled
           ledcAttachPin(ledPin, ledChannel);
         //   ledcAttachPin(19, ledChannel);
           //  ledcAttachPin(18, ledChannel);
             // ledcAttachPin(5, ledChannel);
               //  ledcAttachPin(36, ledChannel);
                 // ledcAttachPin(39, ledChannel);
                   //ledcAttachPin(34, ledChannel);
                   // ledcAttachPin(35, ledChannel);
                    // ledcAttachPin(32, ledChannel);
                     // ledcAttachPin(25, ledChannel);
                      // ledcAttachPin(26, ledChannel);
                       // ledcAttachPin(14, ledChannel);
                        // ledcAttachPin(12, ledChannel);
                         // ledcAttachPin(13, ledChannel);
                          // ledcAttachPin(4, ledChannel);
                           // ledcAttachPin(2, ledChannel);
                            // ledcAttachPin(15, ledChannel);
          }
          
  void ledcontrolloop(int intensity){
              
             //int pwmValue = ledsignal.toInt();
               if(intensity>=0 & intensity<=255){
                // say what you get:
                Serial.print("in led control I received :  ");
                Serial.println(intensity);
                 //PWM Value varries from 0 to 1023  
                ledcWrite(ledChannel, intensity);
                 Serial.print("the value of  PWM now is : ");
                  Serial.println(intensity);
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
    Serial.print("in json setup ");
     Serial.println(buffers);
    JsonObject& root = jsonBuffer.parseObject(buffers);

  // Test if parsing succeeds.
  if (!root.success()) {
    Serial.println("parseObject() failed");
    return;

  }
  
  
    int pole_number = root["pole_number"];
    Serial.print("pole_number ");
    Serial.println(pole_number);
    if(pole_number == moduleNumber||pole_number==0)
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
          SendCommandtoNext=="False";
       
  }if(pole_number != moduleNumber||pole_number==0){
      Serial.println("this not command for me , i will send to next");
       SendCommandtoNext="True";
      Type = 1;
      setupcom();
  }
  }
  
  void Serialloop(String TotalData){
  Buffer="";
   Buffer.concat("s#");
   Buffer.concat(TotalData);
    Serial2.println(Buffer);
    //delay(1000);
    Serial.println("TotalData sent  ");
    
    }
            
     
