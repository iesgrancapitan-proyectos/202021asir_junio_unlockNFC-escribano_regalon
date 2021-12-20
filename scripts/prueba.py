import socket
import time
import os
import RPi.GPIO as GPIO

from mfrc522 import SimpleMFRC522

reader = SimpleMFRC522()
host = "3.210.99.245"   
port = 12000             # The same port as used by the server
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
        GPIO.setmode(GPIO.BOARD)
        GPIO.setup(38, GPIO.OUT)
        GPIO.output(38, 1)
        id, text = reader.read()
        s.sendall(str(id).encode('UTF-8'))
        GPIO.output(38, 0)
        GPIO.cleanup()
        s.close()
        s.shutdown()
    except:
        print("Server not connected")
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connected = False
        pass
    time.sleep(1)
s.close()
