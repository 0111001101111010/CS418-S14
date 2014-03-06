CREATE TABLE moderator (
moderator_id     	    INT(5) NOT NULL AUTO_INCREMENT,
moderator_name_id   	VARCHAR(30) NOT NULL,
moderator_board_id   	INT(5) NOT NULL,
moderator_user_level   INT(5) NOT NULL,
PRIMARY KEY 	(moderator_id)
);
INSERT into moderator (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,"admin",1,10);
INSERT into moderator (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,"test",1,10);
INSERT into moderator (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,"szheng",2,5);
INSERT into moderator (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,"szheng",3,5);
INSERT into moderator (moderator_id, moderator_name_id, moderator_board_id,moderator_user_level) values (null,"orattana",2,5);
