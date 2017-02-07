require 'rubygems'
require 'exifr'

image_file = ARGV.first
exif_info = nil
case image_file.downcase
when /.jpg\Z/
    exif_info = EXIFR::JPEG.new(image_file)
when /.cr2\Z/
    exif_info = EXIFR::JPEG.new(image_file)
when /.tiff?\Z/
    exif_info = EXIFR::TIFF.new(image_file)
end

puts "Standard items".center(72)
puts "=" * 72
puts "                          File : #{image_file}"
puts "                        Height : #{exif_info.height}"
puts "                         Width : #{exif_info.width}"
puts

if exif_info.exif? then
    h = exif_info.exif.to_hash
    puts "('#{image_file}','#{h[:model]}', #{h[:exposure_time]}, #{h[:f_number]}, #{h[:iso_speed_ratings]}, #{h[:focal_length]})"
else
    puts "No EXIF information in this image"
end
