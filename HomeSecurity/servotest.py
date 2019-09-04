import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)
servoPin=11
GPIO.setup(servoPin,GPIO.OUT)
pwm=GPIO.PWM(servoPin,50)
pwm.start(7)
while(1):
	for i in range(0,180):
		DC=1./15.*(i)+1
		pwm.ChangeDutyCycle(DC)
		print(DC)
		time.sleep(.02)
	for i in range(180,0):
		DC=1/18.*i+1
		pwm.ChangeDutyCyble(DC)
		print(DC)
		time.sleep(.02)
pwm.stop()
GPIO.cleanup()

