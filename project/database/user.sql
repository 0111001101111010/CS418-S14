CREATE TABLE users (
user_id     	INT(5) NOT NULL AUTO_INCREMENT,
user_name   	VARCHAR(30) NOT NULL,
user_password   VARCHAR(255) NOT NULL,
user_email  	VARCHAR(255) NOT NULL,
user_date   	DATETIME NOT NULL,
user_level  	INT(5) NOT NULL,
UNIQUE INDEX 	user_name_unique (user_name),
PRIMARY KEY 	(user_id)
)

//insert
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"test","test","test",null,"0");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"root","root","root@root.com",NOW(),"0");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"mweigle","mweigle","mweigle@cs.odu.edu",NOW(),"0");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"TA","TA","TA@cs.odu.edu",NOW(),"0");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"admin","admin","admin@cs.odu.edu",NOW(),"1");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"user","user","user@cs.odu.edu",NOW(),"1");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"szheng","szheng","szheng@cs.odu.edu",NOW(),"2");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_level) values (null,"orattana","orattana","orattana@cs.odu.edu",NOW(),"2");
