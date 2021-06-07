
#CLIENTE

## Este script se encargará de generar el socket sobre el cliente e intentará estar constantemente intentado conectar con el socket servidor.
## Tendremos que indicar un puerto distinto para cada una de las diferentes raspberry.
## Cuando consigue conectarse con el socket servidor recibé los datos que envia el servidor a través de socket para ejecutar el script de python que se encargará
## de activar el relé para leer el dispositivo NFC utilizado por el usuario.
## Cuando termina la ejecución del script en python se mantiene de nuevo a la espera intentando reconectarse con el servidor.

import socket
import time
import os


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
            #print("Telefono Movil")
            id, text = reader.read()
            if id:
                print(id)
                rfid = "Hola"
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
    time.sleep(2)
s.close()
