import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM) # GPIO Numbers instead of board numbers
 
RELAIS_1_GPIO = 27
GPIO.setup(RELAIS_1_GPIO, GPIO.OUT) # GPIO Assign mode

GPIO.output(RELAIS_1_GPIO, GPIO.LOW) # out
print ('OPEN DOOR')
#GPIO.output(RELAIS_1_GPIO, GPIO.HIGH) # on
#GPIO.cleanup()