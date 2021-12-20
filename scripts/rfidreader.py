#!/usr/bin/env python3

import RPi.GPIO as GPIO
import mysql.connector
import MySQLdb
import sys
import time
sys.path.append('/home/pi/MFRC522-python')
from mfrc522 import SimpleMFRC522
reader = SimpleMFRC522()

GPIO.setmode(GPIO.BOARD)
GPIO.setup(38, GPIO.OUT)

try:
    GPIO.output(38, 1)
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
    GPIO.setmode(GPIO.BCM)
    GPIO.setup(4, GPIO.OUT)
    for i in range (0, 3):
        GPIO.output(4, 1)
        time.sleep(0.5)
        GPIO.output(4, 0)
        time.sleep(0.5);
    GPIO.cleanup()
    
else:
    
    insert="INSERT INTO RegistroAcceso (id_profesor,id_puerta,HoraAcceso) Values ("+profesor+",1,CURRENT_TIME)"
    cursor.execute(insert)
    con.commit()
    
    


    

    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)
    GPIO.setup(21, GPIO.OUT)
    for i in range (0, 3):
        GPIO.output(21, 1)
        time.sleep(0.5)
        GPIO.output(21, 0)
        time.sleep(0.5);
    GPIO.setup(13, GPIO.OUT)
    GPIO.output(13, 1)
    time.sleep(1);
    GPIO.output(13, 0)
    
    GPIO.cleanup()
