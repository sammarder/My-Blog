create table `blog`.`music`(id int auto_increment, title varchar(255), album varchar(255), artist varchar(255), seconds int, bit_rate varchar(100), primary key (id));

load data infile "/home/pi/blog/data.csv" into table blog.music fields terminated by ','  (title, album, artist, seconds, bit_rate);
