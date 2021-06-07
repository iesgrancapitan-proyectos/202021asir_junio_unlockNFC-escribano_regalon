
#CLIENTE

## Este script es el encargado de leer la llave o dispositivo movil cuando es ejecutado mediante alguno de los socket.
## Durante la ejecución de este script se almacena el id del profesor y el id del dispositivo que se acaba de leer y 
## se realiza una consulta SQL contra el servidor de base de datos. Si la consulta devulve alguna coincidencia nos permitirá abrir la cerradura,
## si no encuentra ninguna coincidencia el script termina.

#!/usr/bin/env python3

import RPi.GPIO as GPIO
import mysql.connector
import MySQLdb
import sys
import time
sys.path.append('/home/pi/MFRC522-python')
from mfrc522 import SimpleMFRC522
reader = SimpleMFRC522()


try:
    id, text = reader.read()
    time.sleep(0.5)

    

finally:
    GPIO.cleanup()
    
con = mysql.connector.connect(host="3.210.99.245",
                     user="prueba",
                     passwd="usuario",
                     db="nfc")
cursor = con.cursor()
profesor = sys.argv[1]
puerta = 1
exe="select * from profesores where id="+profesor+" and rfid IN "
exe1=('("'+str.strip(text)+'","'+str(id)+'") and id="'+profesor+'" and id IN (SELECT id_profesor from Permisos Where id_puerta=1)')
exe2=(exe+exe1)



cursor.execute("SET SESSION MAX_EXECUTION_TIME=5000")
cursor.execute(exe2)
query=cursor.fetchall()



if(len(query)==0):
    print('<div class="container"><div class="modal-body">No puede abrir esta puerta.</div></div>')
else:
    
    insert="INSERT INTO RegistroAcceso (id_profesor,id_puerta,HoraAcceso) Values ("+profesor+",1,CURRENT_TIME)"
    cursor.execute(insert)
    con.commit()
    
    


    

    GPIO.setmode(GPIO.BCM)
    GPIO.setup(13, GPIO.OUT)
    GPIO.output(13, 1)
    time.sleep(1);
    GPIO.output(13, 0)
    
    
    

