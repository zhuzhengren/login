USE myDB;
CREATE TABLE user(
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(30) DEFAULT NULL,
userpwd varchar(32) DEFAULT NULL,
createtime int(11) NOT NULL,
createip int(11) NOT NULL
PRIMARY KEY (ID)
)ENGINE= MyISAM DEFAULT CHARSET=utf8;
insert into user(username,userpwd) values('admin','admin');