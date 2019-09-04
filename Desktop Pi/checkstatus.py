import socket
import os

def status():
    path = "/home/pi/Desktop/status/"        
    directory = os.listdir(path)
    for file in directory:
        filename  = os.path.join(file)
        
    if filename=="1" :
        return True
    else :
        return False
    
