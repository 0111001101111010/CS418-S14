CREATE TABLE users (
user_id     	INT(5) NOT NULL AUTO_INCREMENT,
user_name   	VARCHAR(30) NOT NULL,
user_password   VARCHAR(255) NOT NULL,
user_email  	VARCHAR(255) NOT NULL,
user_date   	DATETIME NOT NULL,
UNIQUE INDEX 	user_name_unique (user_name),
PRIMARY KEY 	(user_id)
);

//insert
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"admin","admin","admin@cs.odu.edu",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"user","user","user@cs.odu.edu",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"szheng","szheng","szheng@cs.odu.edu",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"test","test","test",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"test2","test2","test2",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"root","root","root@root.com",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"mweigle","mweigle","mweigle@cs.odu.edu",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"TA","TA","TA@cs.odu.edu",NOW());
INSERT into users (user_id, user_name,user_password,user_email,user_date) values (null,"orattana","orattana","orattana@cs.odu.edu",NOW());
