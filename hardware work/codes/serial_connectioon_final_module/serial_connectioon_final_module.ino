#include <HTTPClient.h>
#include <WiFi.h>
#define RXD2 16
#define TXD2 17
String Request;
 
//Access point credentials
const char* ssid = "ESP";
const char* pwd = "12345678";
const char* host = "http://192.168.1.2";
String get_host = "http://192.168.1.2:80";
String Datafromserial;

WiFiServer server(80);  // open port 80 for server connection
 //[{'p_numb':'1','v1':'200','v2':'150','v3':'170','temp':'5.00'},{'p_numb':'2','v1':'200','v2':'200','v3':'200','temp':'5.00'},{'p_numb':'3','v1':'154','v2':'146','v3':'0','temp':'0.02'}]
 //[{'p_numb':'1','v1':'200','v2':'150','v3':'170','temp':'5.00'},{'p_numb':'2','v1':'200','v2':'200','v3':'200','temp':'5.00'},{'p_numb':'3','v1':'154','v2':'146','v3':'0','temp':'0.02'}]



void setup() {
  // put your setup code here, to run once:
     Serial.begin(115200);
     Serial2.begin(115200,SERIAL_8N1,RXD2,TXD2);
     connectToRouter(); 
     }

void loop() {
   //delay(20000);
   Request="c";
   if(Request=="c")
       {
            Serial.println("I will Send  Request to other modules to get their data ");
            Serial2.print(Request);
            delay(10000);
       }
  
  while(Serial2.available()){    
        String x="";
        x=Serial2.readString();
        int size1=x.length();
        Serial.print("total Data length :");
        Serial.println(size1);
        delay(2000);
        Serial.println(x);
        int Separator2 = x.indexOf('#');
        String header=x.substring(0,Separator2);
        //String Data=x.substring(Separator2+1);
                //String Data=x.substring(Separator2-1);
                int Separator3 = x.indexOf(']');
                String Data=x.substring(Separator2+1,Separator3+1);

        Serial.println("Data"+Data);
        int size2=Data.length();
        Serial.print("Recived Data length :");
        Serial.println(size2);
        String sentData="";
        sentData.concat(Data);
         Serial.println("sentData"+sentData);
        if(header=="s"){
              Serial.println("I will send the data to server");
              //connectToRouter();
              get_dataFromServer(sentData);           
          } 
    }

     //delay(40000);
    // delay(20000);
 }

void connectToRouter(){
   Serial.println("Connecting to the Router");
   WiFi.begin(ssid, pwd);
   while (WiFi.status() != WL_CONNECTED) {
      Serial.print(".");
      delay(500);
    }
    Serial.println();
    Serial.println("Connected");
    Serial.print("LocalIP:"); 
    Serial.println(WiFi.localIP());
 
    //starting the server
    server.begin();
    }

    void get_dataFromServer(String Dataa)
  {
    Serial.println("DATAA :");
    Serial.println(Dataa);
   // [{'p_numb':'1','v1':'200','v2':'150','v3':'170','temp':'5.00'},{'p_numb':'2','v1':'200','v2':'200','v3':'200','temp':'5.00'},{'p_numb':'3','v1':'154','v2':'146','v3':'35','temp':'0.02'}]
    //String Dataa="[{'p_numb':1,'v1':200,'v2':150,'v3':170,'temp':5.00},{'p_numb':2,'v1':200,'v2':200,'v3':200,'temp':5.00},{'p_numb':3,'v1':154,'v2':146,'v3':24,'temp':0.02}]";
 //String Dataa="[{'p_numb':'1','v1':'200','v2':'150','v3':'170','temp':'5.00'},{'p_numb':'2','v1':'200','v2':'200','v3':'200','temp':'5.00'},{'p_numb':'3','v1':'153','v2':'144','v3':'23','temp':'0.02'}]";
     if ((WiFi.status() == WL_CONNECTED)) { //Check the current connection status
    HTTPClient http;

    http.begin(get_host+"/fciproject/handlers/communication_with_poles/exchange_data.php?Data="+Dataa); //Specify the URL
    
    int httpCode = http.GET();                                        //Make the request
    if (httpCode > 0) { //Check for the returning code
 
        String ReturnedData = http.getString();
        Serial.println(httpCode);
        Serial.println(ReturnedData);
         //d#{ pole_number:1,intensity:255}
       int Separator1 = ReturnedData.indexOf('#');
       String header=ReturnedData.substring(0,Separator1);
        if(header=="d"){
          Serial.println("I will send the Request to poles");
          Serial2.print(ReturnedData);
         // delay(50000);
      }
 
    http.end(); //Free the resources
  } else {
      Serial.println("Error on HTTP request");
    }
 
  delay(10000);
  }
 
  }
