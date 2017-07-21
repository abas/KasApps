-- SQL STATEMENT

CREATE TABLE 'kas'(
  'id' int(12) NOT NULL AUTO_INCREMENT,
  'nama' varchar(128) DEFAULT NULL,
  'nim' varchar(128) DEFAULT NULL,
  'total_kas' int(11) NOT NULL,
  'last_add' int(12) NOT NULL
  PRIMARY KEY('id')
)ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
