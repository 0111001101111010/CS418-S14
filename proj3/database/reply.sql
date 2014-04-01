CREATE TABLE reply (reply_id INT(5) NOT NULL AUTO_INCREMENT,
              reply_user VARCHAR(30) NOT NULL,
              reply_thread_id INT(5) NOT NULL,
              reply_reply_id INT(5) NOT NULL,
              reply_reply_to_id INT(5) NOT NULL,
              reply_title VARCHAR(75) NOT NULL,
              reply_post  VARCHAR(1000) NOT NULL,
              reply_date DATETIME NOT NULL,
              reply_frozen BOOLEAN NOT NULL,
              reply_editby VARCHAR(30) NOT NULL,
              reply_edited BOOLEAN NOT NULL,
              reply_board_id INT(5) NOT NULL,
              PRIMARY KEY (reply_id));
INSERT INTO reply (reply_id,reply_user,reply_thread_id,reply_reply_id,reply_reply_to_id ,reply_title,reply_post,reply_date,reply_frozen,reply_editby,reply_edited,reply_board_id) values (null,'TEST3',1, 0,-1, 'test2 title','NOTHING LIKE THE REST ', NOW(), FALSE, "admin",FALSE, 1);
#is frozen property
#suspend