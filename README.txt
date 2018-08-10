Griffin Saiia

Seemless Monitor Display:
	How to Set Up Your Raspberry Pi, and How to Run This Dope Display

- You need a Raspberry Pi, ideally with the capability to connect via SSH in
    the Prog network.

- Before any of this below, run these commands on your Pi:
		--> 'sudo apt-get update'
		--> 'sudo apt-get upgrade'

- The Pi needs to have the LAP setup installed so that it operate as a local server
    Once you install Raspbian on your RPi, run these commands:
    --> 'sudo apt-get install apache2 -y'
    --> 'sudo apt-get install php -y'

- The Pi will also need imagemagick, so that it can calculate the runtime of each
		gif.
		--> 'sudo apt-get install imagemagick'

- Check that your Pi has Python 2.7+ installed (NOT Python 3, Python 3 sucks)
		--> 'python --version'
		Should come installed with Raspbian.

- The Pi also needs firefox, and firefox kiosk installed:
    https://addons.mozilla.org/en-US/firefox/addon/r-kiosk/

- Put index.php, the img folder, the slides folder, and picture_frame.css in
    /var/www/html/

- Next we're gonna disable sleep on our Pi (@teamNoSleep):
    Run this command:
    --> 'sudo nano /etc/xdg/lxsession/LXDE/autostart'
    Next comment out '@screensaver -no-splash':
    --> # @xscreensaver -no-splash
    Then add these lines beneath it:
    --> @xset s off
    --> @xset -dpms
    --> @xset s noblank
    Press ctrl-O to save your changes, then ctrl-X to exit.

- Run 'ifconfig', returns ip address - then use PUTTY on a windows machine and
    run the command 'ssh pi@<ip address>', enter password, now you're in

- Back on the Pi, make sure display.sh is executable and on the desktop, then you
		can set up the display by just running that shell script:
    --> 'cd path/to/containingFolder'
    --> './shell.sh'

- Now your display is running. What's cool is using that ssh back door, you can
    add or remove files to that slides/ folder - and the display will automatically
    adjust.

SECURITY:
--> I would disable port 80 and 8080. Both are open by default I believe when
    you install Apache. You won't need them because we're just using Apache to
    run our PHP script.

NOTES:
- Adding slides:
	--> Convert the slide (one slide at a time to avoid headache) you want to add
			into a .mp4 in PowerPoint (if it has animations).
	--> Take that .mp4 and convert it into a .gif
			--> I used https://ezgif.com/maker, but I'm sure there are other tools
					you can find.
			--> This website also has functionality to resize .gifs, play with that
					to avoid ugly pixelation. 
			--> What's important here is your frame rate, make sure the frame rate is
					uniform across all your .gifs that you're including in the display
			--> I used a frame rate of 25 FPS for smooth animations. If you change this,
					update the 'frameRate' variable in calculateRTime.py to your frame rate.
	--> Add it to the /var/www/html/slides/ folder. Your order matters, so always name
			the file page<number>.gif - where number is the order you want the slide to appear
			in.
