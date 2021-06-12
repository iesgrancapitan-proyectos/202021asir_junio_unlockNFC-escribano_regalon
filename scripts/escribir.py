import socket
import time
import os
import RPi.GPIO as GPIO

from mfrc522 import SimpleMFRC522

reader = SimpleMFRC522()
host = "3.210.99.245"   
port = 11000               # The same port as used by the server
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
        GPIO.setmode(GPIO.BOARD)
	GPIO.setup(38, GPIO.OUT)
        GPIO.output(38, 1)
        #print (datos.decode('utf-8'))
        if datos:
            rfid = datos.decode('utf-8')
            print(rfid)
            reader.write(rfid)
	    GPIO.cleanup()
            s.close()
    except:
        print("Server not connected")
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connected = False
        pass
    time.sleep(2)
s.close()
