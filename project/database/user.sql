CREATE TABLE users (  
user_id     	INT(5) NOT NULL AUTO_INCREMENT,  
user_name   	VARCHAR(30) NOT NULL,  
user_password   VARCHAR(255) NOT NULL,  
user_email  	VARCHAR(255) NOT NULL,
user_date   	DATETIME NOT NULL,  
user_post_count INT(8) NOT NULL,
user_lastseen   DATETIME NOT NULL, 
user_level  	INT(5) NOT NULL,  
UNIQUE INDEX 	user_name_unique (user_name),  
PRIMARY KEY 	(user_id)  
)

//insert
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_post_count,user_lastseen,user_level) values (null,"test","test","test",null,"0",null,"0")
    -> ;