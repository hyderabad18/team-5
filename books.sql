CREATE TABLE `iandeye`.
`books` ( `bookid` INT(100) NOT NULL , `version` TEXT NOT NULL ,
 `title` TEXT NOT NULL , `author` TEXT NOT NULL ,
 `category` TEXT NOT NULL , `status` BINARY(10) NOT NULL ,
 PRIMARY KEY (`bookid`(100))) ENGINE = InnoDB;