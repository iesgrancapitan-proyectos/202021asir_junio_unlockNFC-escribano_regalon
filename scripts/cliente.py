import socket
import time
import os
import RPi.GPIO as GPIO


from mfrc522 import SimpleMFRC522

reader = SimpleMFRC522()
host = "3.210.99.245"   
port = 10001               # The same port as used by the server
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
connected = False
print("Server not connected")
while True:
  if(not connected):
    try:
        s.connect((host, port))
        print("Server connected")
        connected = True
        
    except:
        pass
  else:
    try:
        datos = s.recv(4096)
        #print (datos.decode('utf-8'))
        movil = b'1000'
        if datos == movil:
            GPIO.setmode(GPIO.BOARD)
            GPIO.setup(38, GPIO.OUT)
            GPIO.output(38, 1)
            #print("Telefono Movil")
            id, text = reader.read()
            if id:
                #print(id)
                rfid = "Hola"
                GPIO.output(38, 0)
                GPIO.cleanup()
                s.sendall(str(id).encode('UTF-8'))
                s.close()
        else:
            print(datos)
            os.system("python3 /home/pi/Desktop/rfidreader.py "+datos.decode('utf-8')+"")
            s.close()
    except:
        print("Server not connected")
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connected = False
        pass
    time.sleep(1)
s.close()
