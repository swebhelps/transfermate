CREATE DEFINER=`root`@`localhost` PROCEDURE `getAuthorDetails` ()  NO SQL
BEGIN
    SET @query =  CONCAT("SELECT a.author_name,b.book_name FROM `author` as a LEFT JOIN book as b on b.author_id=a.author_id  group by b.book_name");

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END$$



CREATE DEFINER=`root`@`localhost` PROCEDURE `getAuthorDetailsByName` (IN `author_name_str` LONGTEXT)  NO SQL
BEGIN
    SET @author_name_str = author_name_str;
    SET @query =  CONCAT("SELECT a.author_name,b.book_name FROM `author` as a LEFT JOIN book as b on b.author_id=a.author_id where a.author_name LIKE '%", @author_name_str,"%' group by b.book_name");

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END$$

DELIMITER ;