CREATE TABLE image (
image_id INT(5) NOT NULL AUTO_INCREMENT,
reply_id INT(5),
user    VARCHAR(30) NOT NULL,
path   	VARCHAR(30) NOT NULL,
PRIMARY KEY 	(image_id)
);
