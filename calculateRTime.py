#!/usr/bin/python

# Griffin Saiia, .gif frame rate calulator

import os
import sys
import subprocess

# identify -format "%n\n" /var/www/html/slides/gif | head -1

def main():
	frameRate = 25
	directory = "/var/www/html/slides/"
	logFile = "/var/www/html/runtimes.txt"
	calculateRTime(frameRate, directory, logFile)

def calculateRTime(frameRate, directory, path):
	output = []
	for file in os.listdir(directory):
		command = 'identify -format "%n\n" /var/www/html/'+file+' | head -1'
		output.append(subprocess.check_output(command, shell=True))
	with open(path, "w+") as log:
		for frames in output:
			log.write(str((int(frames)*frameRate)+2)+"\n")

# to run it from command line
if __name__ == '__main__':
	try:
		main()
	except KeyboardInterrupt:
		print("")
		print('Interrupted')
        try:
			sys.exit(0)
	except SystemExit:
			os._exit(0)
