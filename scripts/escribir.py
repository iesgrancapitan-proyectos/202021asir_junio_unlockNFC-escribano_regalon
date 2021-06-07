## Este script es utilizado para crear un socket cliente sobre el puerto 11.000
## Este puerto es utilizado para el grabado de las llaves NFC
## Se encarga de intentar conectar constantemente contra el socket servidor en el puerto 11.000, cuando recibe información a través del socket se encarga de almacenarla en
## una llave NFC.

import socket
import time
import os


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
        #print (datos.decode('utf-8'))
        if datos:
            rfid = datos.decode('utf-8')
            print(rfid)
            reader.write(rfid)
            s.close()
    except:
        print("Server not connected")
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        connected = False
        pass
    time.sleep(2)
s.close()
