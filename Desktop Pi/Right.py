from gpiozero import Servo
from time import sleep
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)

#myGPIO=17
servo = Servo(17)
#servo = Servo(myGPIO)
print("Rassberry Pi Servo"); 

servo.min()
print("min")
sleep(1)
GPIO.cleanup()