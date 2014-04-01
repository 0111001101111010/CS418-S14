CREATE TABLE users (
user_id     	INT(5) NOT NULL AUTO_INCREMENT,
user_name   	VARCHAR(30) NOT NULL,
user_password   VARCHAR(255) NOT NULL,
user_email  	VARCHAR(255) NOT NULL,
user_date   	DATETIME NOT NULL,
user_suspended  BOOLEAN NOT NULL,
user_preference VARCHAR(30) NOT NULL,
UNIQUE INDEX 	user_name_unique (user_name),
PRIMARY KEY 	(user_id)
);


INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"admin","admin","admin@cs.odu.edu",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"user","user","user@cs.odu.edu",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"szheng","szheng","szheng@cs.odu.edu",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"test","test","test",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"test2","test2","test2",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"root","root","root@root.com",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"mweigle","mweigle","mweigle@cs.odu.edu",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"TA","TA","TA@cs.odu.edu",NOW(),FALSE,"text/html");
INSERT into users (user_id, user_name,user_password,user_email,user_date,user_suspended, user_preference) values (null,"orattana","orattana","orattana@cs.odu.edu",NOW(),FALSE,"text/html");
