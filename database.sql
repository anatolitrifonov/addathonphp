CREATE TABLE sturgeonderbies (
id int(11) NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL DEFAULT '',
event_date datetime,
is_open tinyint(3) NOT NULL DEFAULT '0',
short_name varchar(50) NOT NULL DEFAULT '',
PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


CREATE TABLE sturgeonscores (
  id int(11) NOT NULL AUTO_INCREMENT,
  team_id int(11) NOT NULL DEFAULT '0',
  slot int(11) NOT NULL DEFAULT '0',
  score int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=1032 DEFAULT CHARSET=utf8;


CREATE TABLE sturgeonteams (
  id int(11) NOT NULL AUTO_INCREMENT,
  derby_id int(11) NOT NULL DEFAULT '0',
  name varchar(255) NOT NULL DEFAULT '',
  secret_string varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;


INSERT INTO sturgeonderbies VALUES (1,'Addathon November 2017','2017-04-11 00:00:00',0,'add112017');
