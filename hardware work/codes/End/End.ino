 

//modules in the middle
#include <WiFi.h>
#include <ArduinoJson.h>
int moduleNumber=3;
char ssidME[] = "ESP_3";           // SSID of your AP
char ssid2[] = "ESP_2"; 
//char ssid3[] = "ESP_3"; 
char pass[] = "esp12345";
String idToConnect="";
int port = 80;
IPAddress IP_Server(192,168,4,15);
IPAddress mask = (255, 255, 255, 0);
WiFiServer server(port);
WiFiClient client;
int Type = 0; //0=AP 1=S
String Request;//99=from server  1(00=to server)will not be used 
String Mydata="100";
//int sent;
//variable for sensors
 int volt1,volt2,volt3;
  float temp;
  float RawData,RawDatainMilli,celsius,fahrenheit;
  int Lm35PIN=32;
  String sensoredData,sensoredDatag,ResponsedData;
  int Separator;
String dataFromPrevious,header;
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
   if(Type==0){//mode is acess point 
   // Serial.println("Mode Now is Acess Point ");
      WiFiClient client = server.available();
      if (!client) {return;}
      Request = client.readStringUntil('\r');
      client.println("ACK\r");
      Serial.println("*-----------Request From Station------------*");
      Serial.println(Request);
      Separator = Request.indexOf('#');
      header=Request.substring(0,Separator);
       if(header=="d"){
              Serial.println("Request Header : "+header);
                  Serial.println("This command from server to control led I will check it if it for me");
                  dataFromPrevious=Request.substring(Separator+1);
                   //Serial.println("dataFromPrevious : "+dataFromPrevious);
                    jsonsetup(dataFromPrevious);
                    //SendCommandtoNext=="False";
                     //Serial.print("SendCommandtoNext "+SendCommandtoNext);
                      // Serial.println(SendCommandtoNext);    
      
                    }else if(Request=="GET / HTTP/1.1")
      {
        Serial.println("Request from outer I will reject it");
        WiFi.softAPdisconnect(true);
      }else if(Request=="c")//send request to other modules to get their data
               {
                sensoredDatag= loopSensor();
               // Serial.println("I will Send to other modules to get their data ");
               Serial.println("I am the final module and request to collect data recived ");
                Type = 1;//sation
               }
                
       
      
      Serial.println("---------------------------------");
      client.flush();
      //delay(3000);  
      setupcom();
  }else{
       // Serial.println("Mode Now is Station ");
      client.connect(IP_Server, port);   
      //Serial.println("********************************");
     String Response=FormatOfMyData();
      client.println(Response);
      String answer = client.readStringUntil('\r');
      if(answer=="ACK")
      {
        Serial.println("Acknolagement Received");
      }else
        {
          Serial.println("NO Acknolagement Received");
        }
      client.flush();
      client.stop();
     // delay(2000);    
      Type = 0;
      setupcom();
  }

}
void setupcom(){
  if(Type ==0){
    //////////////////////mode is acess point
    WiFi.mode(WIFI_AP);
    WiFi.softAP(ssidME, pass,1,true,2);
    WiFi.softAPConfig(IP_Server, IP_Server, mask);
    server.begin();
    Serial.println("ESP_3 AP started.");
  }
  ///////////////////////mode is station 
  else{
    WiFi.mode(WIFI_STA);
    //if(Request=="c")
   // {
      idToConnect="ESP_2";
      WiFi.begin(ssid2, pass);           // connects to the WiFi AP

    //}
    //else if(Request=="100")
      //idToConnect="ESP_1";
     // WiFi.begin(ssid1, pass);           // connects to the WiFi AP

     // }
    Serial.println();
    Serial.println("Try to connect the "+idToConnect);
    while (WiFi.status() != WL_CONNECTED) 
    {
      Serial.print(".");
      delay(500);
    }
    Serial.println();
    Serial.println("Connection Done");
  }
  }


void setupSensor(){
    
  Serial.begin(115200);
  pinMode(36, INPUT);
  pinMode(39, INPUT);
  pinMode(35, INPUT);
  pinMode(32, INPUT); 
    
    }
  String loopSensor(){
    Serial.println("Collected Sensores output in my module");
        Serial.println("");
    //Serial.println("-------Voltage values-------------------->");
  volt1=analogRead(36);
  volt1=map(volt1,0,4095,0,300);
  Serial.print("volt1 = ");
  Serial.println(volt1);
  //delay(600);
   volt2=analogRead(39);
   volt2=map(volt2,0,4095,0,300);
   Serial.print("volt2 = ");
   Serial.println( volt2);
  //delay(600);
   volt3= analogRead(35);
    volt3=map(volt3,0,4095,0,300);
    Serial.print("volt3 = ");
    Serial.println(volt3);
   // delay(600);
    //Serial.println("------------------>");
    //delay(1200);
   // Serial.println("-------------tempreature-------------->");

    RawData=analogRead(Lm35PIN);
    RawDatainMilli=RawData/1024.0;
    celsius=RawDatainMilli/10;
     Serial.print("Tempreture on Celsius = ");
    Serial.println(celsius);

 int battery =13;
//            analogRead(32);
   //         battery=map(volt1,0,4095,0,30);
 int solar_cell=18;
    //       analogRead(15);
   //        solar_cell=map(volt1,0,4095,0,300);
   
    int ledsensor=1;
    sensoredData="";
   sensoredData.concat(",{'pn':'");
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
      sensoredData.concat("'}]");
    Serial.println("------------------>");
    Serial.println(sensoredData);
    
   // delay(2400);
      
      return sensoredData;
      }
      String FormatOfMyData(){
        ResponsedData="";
        ResponsedData.concat("100");
        ResponsedData.concat("#");
       // sensoredDatag= loopSensor();
        ResponsedData.concat(sensoredDatag);
       // Serial.println("MysensoredData "+sensoredDatag);
        ResponsedData.concat('\r');
       Serial.println("Response \"Data for This Pole\": "+ResponsedData);
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
                  Serial.println("The led now is work with intensity :"+intensity);
               }else{
                
               // Serial.print("the value out of range 0==255 :" );
                //Serial.println(intensity);
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
   // Serial.print("pole_number ");
   // Serial.println(pole_number);
    if(pole_number == moduleNumber||pole_number==0)
    {
            //String Led_status = root["Led_status"];
        int Intensity = root["intensity"];
       //  Serial.println("Intensity "+Intensity);
         ledcontrolsetup();
        ledcontrolloop(Intensity);
        
       // String Led_Auto = root["Led_Auto"];
      //if(Led_Auto=="on"||Led_Auto=="ON")
      //{
      //Serial.println("I will make led perform with available state");
      //}
      //   Serial.print("Pole_number: ");
      //   Serial.println(pole_number);
       //  Serial.print("Intensity: ");
       //  Serial.println(Intensity);
          //SendCommandtoNext=="False";
       
  }else{
      Serial.println("I am the final module so this is an error request");
      // SendCommandtoNext="True";
      Type = 0;
      setupcom();
  }
  }
  
  void Serialloop(String TotalData){
  Buffer="";
   Buffer.concat("s#");
   Buffer.concat(TotalData);
    Serial2.println(Buffer);
    //delay(1000);
    Serial.println("Data now in thisway to server ");
    
    }
            
     
