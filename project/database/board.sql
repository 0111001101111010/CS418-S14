CREATE TABLE board (
board_id     	    INT(5) NOT NULL AUTO_INCREMENT,
board_title 	      VARCHAR(30) NOT NULL,
board_description 	VARCHAR(200) NOT NULL,
PRIMARY KEY 	(board_id)
);
INSERT into board (board_id,board_title,board_description) values (null,"Idea Board", "Where you can share cool ideas you want to do");
INSERT into board (board_id,board_title,board_description) values (null,"Skill Share", "Share tool tips and and sites to increase your knowledge");
INSERT into board (board_id,board_title,board_description) values (null,"Upcoming Events","Wheres the next big event? Find out!");
INSERT into board (board_id,board_title,board_description) values (null,"Find a friend", "Projects are boring alone, find a partner!");
INSERT into board (board_id,board_title,board_description) values (null, "Missed Connection","Saw you somewhere, maybe you saw me back too!");
INSERT into board (board_id,board_title,board_description) values (null,"General Discussion", "Generally Discussed");
