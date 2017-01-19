from mutagen.mp3 import MP3 
from eyed3.mp3 import Mp3AudioFile
import glob
for path in glob.glob("/home/pi/Music/Approaching Nirvana/Blocking the Sky/*mp3"):
	a = MP3(path) 
	m = Mp3AudioFile(path)
	line = "'" + str(m.tag.title) + "','" + str(m.tag.album) + "','" + str(m.tag.artist) + "'," + str(a.info.length) + ",'" + m.info.bit_rate_str + "'"
	print line
