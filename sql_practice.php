<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=dbone", "root");
    echo "database connected<hr>";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

try {
    $stmt = $db->exec("
        DROP TABLE IF EXISTS `dbone`.`students`;
    ");
    $stmt = $db->exec("
        CREATE TABLE students (
            sid INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50),
            gender CHAR(1),
            age INT)
    ");
    echo "table added<hr>";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

try {
    $stmt = $db->exec("
        INSERT INTO students (name, gender, age)
        VALUES 
        ('Kendice', 'F', 20),
        ('Mann', 'M', 3),
        ('Kingg', 'M', 2)
    ");
    echo "database inserted: $stmt<hr>";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

try {
    $stmt = $db->exec("
        UPDATE students
        SET age = 10000
        WHERE name = 'Mann'
    ");
    echo "database updated: $stmt<hr>";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

try {
    $stmt = $db->exec("
        DELETE FROM students
        WHERE name = 'Kendice' OR name = 'Kingg'
    ");
    echo "record deleted: $stmt";
} catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>