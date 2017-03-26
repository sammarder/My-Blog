import sys
import PIL.Image 
import PIL.ExifTags 

fall = (9, 10, 11) 
winter = (12, 1, 2) 
spring = (3, 4, 5)
summer = (6, 7, 8)

insert = "INSERT IGNORE INTO photos (name,model,shutter_speed,f_number,iso,lens_length,year,season) VALUES (\""
#print(sys.argv[1])
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
#print(exif)
exposure = str(exif['ExposureTime'][0]) + "/" + str(exif['ExposureTime'][1])
fnum = "{0}/{1}".format(exif["FNumber"][0], exif["FNumber"][1])

dt = exif["DateTime"] 
dp = dt.split(":")
month = int(dp[1])
data = "\"{0}\",\"{1}\",{2},{3},{4},\"{5}\"".format(exif['Model'], exposure, fnum, exif['ISOSpeedRatings'], exif['FocalLength'][0], dp[0])
insert += data
#print(data)
if (month in summer):
    insert += ",\"Summer\");"
elif (month in spring):
    insert += ",\"Spring\");"
elif (month in winter):
    insert += ",\"Winter\");"
elif (month in fall):
    insert += ",\"Fall\");"
print(insert)
