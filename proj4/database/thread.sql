CREATE TABLE thread(
thread_id INT(5) NOT NULL AUTO_INCREMENT,
thread_board_id INT(5) NOT NULL,
thread_user VARCHAR(30) NOT NULL,
thread_name VARCHAR(75) NOT NULL,
thread_frozen BOOLEAN NOT NULL,
thread_description VARCHAR(100) NOT NULL,
thread_date DATETIME NOT NULL,
PRIMARY KEY (thread_id),
FULLTEXT (thread_name)
);

INSERT INTO thread (thread_id, thread_board_id, thread_user, thread_name,thread_description, thread_date)
values (null, 1, "admin","Frozen Quote Machine", "Do you like to build a snowman", NOW());
#freeze the threads
