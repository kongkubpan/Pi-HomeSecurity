from gpiozero import Servo
from time import sleep
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)
#myGPIO=17

servo = Servo(17)
print("Rassberry Pi Servo"); 

servo.mid()
print("mid")
sleep(1)
GPIO.cleanup()