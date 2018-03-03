import sys
import PIL.Image
import PIL.ExifTags
import mysql.connector
import ConfigParser

config = ConfigParser.RawConfigParser()
config.read('import/db.cfg')
user = config.get('db', 'user')
port = config.get('db','port')
host = config.get('db', 'host')
pwd = config.get('db', 'pass')
cnx = mysql.connector.connect(user=user, password=pwd, host=host, database="blog")
cursor = cnx.cursor()

fall = (9, 10, 11)
winter = (12, 1, 2)
spring = (3, 4, 5)
summer = (6, 7, 8)

insert = "INSERT IGNORE INTO photos (name,year,digitized,season) VALUES (\""
absoluteFile = sys.argv[1]
file = absoluteFile.split("/")
name = file[-1].split(".")[0]
insert += name + "\","
img = PIL.Image.open(absoluteFile)

exif = {
    PIL.ExifTags.TAGS[k]: v
    for k, v in img._getexif().items()
    if k in PIL.ExifTags.TAGS
}

dt = exif["DateTimeDigitized"]
dp = dt.split(":")
month = int(dp[1])
data = str(dp[0])
insert += data + ", \"" + dt + "\""

if (month in summer):
    insert += ",\"Summer\");"
elif (month in spring):
    insert += ",\"Spring\");"
elif (month in winter):
    insert += ",\"Winter\");"
elif (month in fall):
    insert += ",\"Fall\");"

cursor.execute(insert)
cnx.commit()
cursor.close()
cnx.close()
