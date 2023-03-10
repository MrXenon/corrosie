

-- Maak scripts tabel aan.
DELIMITER $$
DROP PROCEDURE IF EXISTS createScriptsTable $$
CREATE PROCEDURE createScriptsTable()
BEGIN
    CREATE TABLE IF NOT EXISTS `scripts`(
        id INT (10) NOT NULL AUTO_INCREMENT,
        naam VARCHAR(256) NOT NULL,
        PRIMARY KEY  (id))
        ENGINE = InnoDB DEFAULT CHARSET=latin1;
END$$
CALL createScriptsTable()$$
DROP PROCEDURE IF EXISTS createScriptsTable $$
DELIMITER ;

-- Voeg script naam toe aan scrip tabel.
INSERT INTO `scripts` (`naam`) VALUES ('step 1 - create chapters.sql');


-- Maak scripts tabel aan.
DELIMITER $$
DROP PROCEDURE IF EXISTS createScriptsTable $$
CREATE PROCEDURE createScriptsTable()
BEGIN
    CREATE TABLE IF NOT EXISTS `chapters`(
        `id` INT (10) NOT NULL AUTO_INCREMENT,
        `chapter` TEXT NOT NULL,
        `sortorder` INT(10) NOT NULL,
        PRIMARY KEY  (id))
        ENGINE = InnoDB DEFAULT CHARSET=latin1;
END$$
CALL createScriptsTable()$$
DROP PROCEDURE IF EXISTS createScriptsTable $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS insertChapter $$
CREATE PROCEDURE insertChapter(
    IN `chapternaam` TEXT,
    IN `ordernr` INT(10)
)
BEGIN
       IF NOT EXISTS(SELECT 1 FROM `chapters` WHERE LOWER(LTRIM(RTRIM(`chapter`))) = LOWER(LTRIM(RTRIM(`chapternaam`)))) THEN
              INSERT INTO `chapters` (`chapter`, `sortorder`)
              VALUES (`chapternaam`, `ordernr`);
       END IF;
END $$
CALL insertChapter('hoofdstuk1','1') $$
CALL insertChapter('hoofdstuk2','2') $$
DELIMITER ;


-- Maak scripts tabel aan.
DELIMITER $$
DROP PROCEDURE IF EXISTS createScriptsTable $$
CREATE PROCEDURE createScriptsTable()
BEGIN
    CREATE TABLE IF NOT EXISTS `subchapter`(
        `id` INT (10) NOT NULL AUTO_INCREMENT,
        `chapter` TEXT NOT NULL,
        `sortorder` INT(10) NOT NULL,
        PRIMARY KEY  (id))
        ENGINE = InnoDB DEFAULT CHARSET=latin1;
END$$
CALL createScriptsTable()$$
DROP PROCEDURE IF EXISTS createScriptsTable $$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS insertSubChapter $$
CREATE PROCEDURE insertSubChapter(
    IN `chapternaam` TEXT,
     IN `ordernr` INT(10)
)
BEGIN
       IF NOT EXISTS(SELECT 1 FROM `subchapter` WHERE LOWER(LTRIM(RTRIM(`chapter`))) = LOWER(LTRIM(RTRIM(`chapternaam`)))) THEN
              INSERT INTO `subchapter` (`chapter`,`sortorder`)
              VALUES (`chapternaam`, `ordernr`);
       END IF;
END $$
CALL insertSubChapter('Soorten Corrosie 1.1','1') $$
CALL insertSubChapter('Soorten Corrosie 1.2','2') $$
CALL insertSubChapter('Soorten Corrosie 1.3','3') $$
CALL insertSubChapter('de Bhopal pesticiden fabriek','1') $$
CALL insertSubChapter('subpage2','2') $$
CALL insertSubChapter('2.1 Direct en indirecte kosten van schade door corrosie','3') $$
CALL insertSubChapter('2.2 Voorbeelden','4') $$
CALL insertSubChapter('Scheepvaart','5') $$
CALL insertSubChapter('Instorten van zwembaddak','6') $$
CALL insertSubChapter('Luchtvaart','7') $$
CALL insertSubChapter('Drinkwatersystemen','8') $$
CALL insertSubChapter('3.3 Economische gevolgen','9') $$
DELIMITER ;
CALL insertSubChapter('NoChapter','0');


-- Maak scripts tabel aan.
DELIMITER $$
DROP PROCEDURE IF EXISTS createScriptsTable $$
CREATE PROCEDURE createScriptsTable()
BEGIN
    CREATE TABLE IF NOT EXISTS `chaptercontent`(
        `id` INT (10) NOT NULL AUTO_INCREMENT,
        `chapter` INT(10) NOT NULL,
        `subchapter` INT(10) NOT NULL,
        `page_content` TEXT NOT NULL,
        PRIMARY KEY  (id))
        ENGINE = InnoDB DEFAULT CHARSET=latin1;
END$$
CALL createScriptsTable()$$
DROP PROCEDURE IF EXISTS createScriptsTable $$
DELIMITER ;


DELIMITER $$
DROP PROCEDURE IF EXISTS insertChapterContent $$
CREATE PROCEDURE insertChapterContent(
IN `chapternaam` VARCHAR(255),
IN `subchapternaam` VARCHAR(255),
IN `content` TEXT
)
BEGIN
    DECLARE chapterid INT;
    DECLARE subchapterid INT;

    SELECT `id` INTO chapterid FROM `chapters` WHERE `chapter` = `chapternaam`;
    SELECT `id` INTO subchapterid FROM `subchapter` WHERE `chapter` = `subchapternaam`;

       IF NOT EXISTS(SELECT 1 FROM `chaptercontent` WHERE LOWER(LTRIM(RTRIM(`chapter`))) = LOWER(LTRIM(RTRIM(`chapternaam`)))
       AND LOWER(LTRIM(RTRIM(`subchapter`))) = LOWER(LTRIM(RTRIM(`subchapternaam`)))) THEN
              INSERT INTO `chaptercontent` (`chapter`, `subchapter`,`page_content`)
              VALUES (chapterid, subchapterid,`content`);
       END IF;
END $$
DELIMITER ;
