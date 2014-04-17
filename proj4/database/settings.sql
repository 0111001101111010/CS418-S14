CREATE TABLE settings (
setting_id     	INT(5) NOT NULL AUTO_INCREMENT,
setting_name   	VARCHAR(30) NOT NULL,
setting_value     	INT(5) NOT NULL,
setting_date   	DATETIME NOT NULL,
UNIQUE INDEX 	user_name_unique (setting_name),
PRIMARY KEY 	(setting_id)
);
INSERT into settings (setting_id, setting_name, setting_value, setting_date) values (null,"pages",5,NOW());