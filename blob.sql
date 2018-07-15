CREATE TABLE uploads
    (
        id  INT NOT NULL AUTO_INCREMENT,
       name VARCHAR(40) NOT NULL,
      data BLOB NOT NULL ,
		   mime IVARCHAR(40) NOT NULL,
		   PRIMARY KEY (id)
		);