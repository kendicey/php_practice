<?php
try {
    $db = new PDO('mysql:host=db.example.com;dbname=dishes');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->query('SELECT * FROM dishes
                     SORT BY price');
    while ($row = $q->fetch()) {
        print "$row[dish_id], $row[dish_name], $row[price], $row[is_spicy]";
    }
} catch (PDOException $e) {
    print "Couldn't connect to the database: " . $e->getMessage();
}
?>