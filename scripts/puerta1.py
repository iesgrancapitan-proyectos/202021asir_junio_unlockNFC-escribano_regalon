#SERVIDOR
###Este script nos creará un socket que estrá escuchando peticiones de los clientes sobre el puerto 10001 cuando el usuario seleciona el Departamento de informática.
###Enviará a través del socket el id del profesor para que la reaspberry asociada a este puerto genere una consulta SQL.
###Por cada una de las puertas tendremos uns scrit para cada puerto (10001,10002....).

import socket
import threading
import sys
profesor = sys.argv[1]
puerta = sys.argv[2]
host = "172.31.31.179"
port = 10001



sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print ("Socket Created")
sock.bind((host, port))
print ("socket bind complete")
sock.listen(1)
print ("socket now listening")
print(port)
def worker(*args):
    conn = args[0]
    addr = args[1]
    try:
        print('conexion con {}.'.format(addr))
        conn.send(profesor.encode('UTF-8'))
        sock.shutdown(socket.SHUT_RDWR)
        sock.close()
        while True:
            datos = conn.recv(4096) 
            if datos:
                print('recibido: {}'.format(datos.decode('utf-8')))
                print(datos.decode('utf-8')) 
                ##conn.send(profesor.encode('UTF-8'))
            else:
                print("prueba")
                sock.close()
                break
                conn.close()
    finally:
        conn.close()
while 1:
    conn, addr = sock.accept()
    threading.Thread(target=worker, args=(conn, addr)).start()



