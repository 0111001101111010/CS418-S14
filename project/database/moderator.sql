CREATE TABLE moderator (
moderator_id     	    INT(5) NOT NULL AUTO_INCREMENT,
moderator_name_id   	 INT(5) NOT NULL,
moderator_board_id   	INT(5) NOT NULL,
moderator_user_level   INT(5) NOT NULL,
PRIMARY KEY 	(moderator_id)
);
INSERT into users (moderator_id, moderator_name_id, moderator_board_id) values (null,1,0,10);
