SET FOREIGN_KEY_CHECKS=1;
SET autocommit=0;
START TRANSACTION
    INSERT into $table ($param,$param2)
    VALUES ($values,$values2);
COMMIT;