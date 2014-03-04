CREATE TABLE board (
board_id     	    INT(5) NOT NULL AUTO_INCREMENT,
board_description 	VARCHAR(30) NOT NULL,
PRIMARY KEY 	(board_id)
);
INSERT into board (board_id,board_description) values (null,"Idea Board");
INSERT into board (board_id,board_description) values (null,"Skill Share");
INSERT into board (board_id,board_description) values (null,"Upcoming Events");
INSERT into board (board_id,board_description) values (null,"Find a friend");
INSERT into board (board_id,board_description) values (null,"Missed Connection");
