//with red led
#define RXD2 16
#define TXD2 17
String Request;

void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
   Serial2.begin(115200,SERIAL_8N1,RXD2,TXD2);
  // Serial.println("serial TXD is on pin "+String (TX));
  // Serial.println("serial RXD is on pin "+String (RX));
  

}

void loop() {
  // put your main code here, to run repeatedly:
  if (Serial.available() > 0){
  Request=Serial.readString();
   Serial.print("I received :  ");
   Serial.println(Request);
  //Serial2.print(Request);
   /////first command to collect data
   if(Request=="c")
    {
    Serial.println("I will Send to other modules to get their data ");
  Serial2.print(Request);
  }
  //command from server to control specific pole light
  else{//d#{ pole_number:1,intensity:255}
    int Separator1 = Request.indexOf('#');
       String header=Request.substring(0,Separator1);
        if(header=="d"){
          Serial.println("I will send the Request to poles");
          Serial2.print(Request);
          
    
    }
    }
  
  
  
  
  }
  while(Serial2.available()){    
    String x="";
    x=Serial2.readString();

Serial.println(x);
int Separator2 = x.indexOf('#');
       String header=x.substring(0,Separator2);
        if(header=="s"){
          Serial.println("I will send the data to server");
          
          
          }

    
   // Serial.println(x);
    int size=x.length();
        Serial.print("All Data length :");
         Serial.println(size); 
    }
}
