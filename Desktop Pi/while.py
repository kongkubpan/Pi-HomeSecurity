import os
import time
from checkstatus import status

while True:
    if(status()):
        print ('ON')
        time.sleep(1)
    else:
        print('OFF')
        time.sleep(1)
    