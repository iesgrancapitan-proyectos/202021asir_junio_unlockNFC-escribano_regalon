#!/usr/bin/env python3




import socket
import threading
import sys
host = "172.31.31.179"
port = 12000



sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
#print ("Socket Created")
sock.bind((host, port))
#print ("socket bind complete")
sock.listen(1)
#print ("socket now listening")
#print(port)
def worker(*args):
    conn = args[0]
    addr = args[1]
    try:
        #print('conexion con {}.'.format(addr))
        #conn.send(profesor.encode('UTF-8'))
        #sock.shutdown(socket.SHUT_RDWR)
        #sock.close()
        while True:
            datos = conn.recv(4096) 
            if datos:
                print(datos.decode('utf-8'))
                sock.shutdown(socket.SHUT_RDWR)
                ##conn.send(profesor.encode('UTF-8'))
                #sock.close()
                #conn.close()
            else:
                #print("prueba")
                break
                conn.close()
    finally:
        conn.close()
while 1:
    conn, addr = sock.accept()
    threading.Thread(target=worker, args=(conn, addr)).start()


