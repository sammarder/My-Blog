from mutagen.mp3 import MP3 
from eyed3.mp3 import Mp3AudioFile
import glob
for path in glob.glob("/home/pi/blog/public/music/*mp3"):
	a = MP3(path) 
	m = Mp3AudioFile(path)
	length = str(int(a.info.length / 60)) + ":" + "%02d" % (int(a.info.length % 60))
        name = path.split("/")[-1]
	line = "('" + name + "','" + str(m.tag.title) + "','" + str(m.tag.album) + "','" + str(m.tag.artist) + "','" + length + "','" + m.info.bit_rate_str + "'),"
	print line
