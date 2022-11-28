
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAuthorDetails` ()  NO SQL
BEGIN
    SET @query =  CONCAT("SELECT * FROM book as b left join author_book as ab on ab.book_id=b.book_id left join author as a on a.author_id=ab.author_id");

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAuthorDetailsByName` (IN `author_name_str` LONGTEXT)  NO SQL
BEGIN
    SET @author_name_str = author_name_str;
    SET @query =  CONCAT("SELECT * FROM book as b left join author_book as ab on ab.book_id=b.book_id  left join author as a on a.author_id=ab.author_id  where a.author_name LIKE '%", @author_name_str,"%'");

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END$$

DELIMITER ;