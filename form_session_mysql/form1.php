<?php

function display_form($errors = [])
{
    echo "<h3>Order form</h3>";
    echo "<form method='POST' action='$_SERVER[PHP_SELF]'>";
    echo "<label>Apple: </label>";
    echo "<input type='number' name='apple' value='" . ($_SESSION['apple'] ?? 0) . "'>";
    if (isset($errors[0])) {
        echo "<span>$errors[0]</span>";
    }
    echo "<br><br><label>Orange: </label>";
    echo "<input type='number' name='orange' value='" . ($_SESSION['orange'] ?? 0) . "'>";
    if (isset($errors[1])) {
        echo "<span>$errors[1]</span>";
    }
    echo "<br><br><label>Banana: </label>";
    echo "<input type='number' name='banana' value='" . ($_SESSION['banana'] ?? 0) . "'>";
    if (isset($errors[2])) {
        echo "<span>$errors[2]</span>";
    }
    echo "<br><br><label>Grape: </label>";
    echo "<input type='number' name='grape' value='" . ($_SESSION['grape'] ?? 0) . "'>";
    if (isset($errors[3])) {
        echo "<span>$errors[3]</span>";
    }
    echo "<br><br><label>Pear: </label>";
    echo "<input type='number' name='pear' value='" . ($_SESSION['pear'] ?? 0) . "'>";
    if (isset($errors[4])) {
        echo "<span>$errors[4]</span>";
    }
    echo "<br><br><label>Kiwi: </label>";
    echo "<input type='number' name='kiwi' value='" . ($_SESSION['kiwi'] ?? 0) . "'>";
    if (isset($errors[5])) {
        echo "<span>$errors[5]</span>";
    }
    echo "<br><br><label>Name: </label>";
    echo "<input type='text' name='name' value='" . ($_SESSION['name'] ?? '') . "'>";
    if (isset($errors[7])) {
        echo "<span>$errors[7]</span>";
    }
    echo "<br><br><label>User ID: </label>";
    echo "<input type='text' name='userID' value='" . ($_SESSION['userID'] ?? '') . "'>";
    if (isset($errors[8])) {
        echo "<span>$errors[8]</span>";
    }
    echo "<br><br><input type='submit' name='submit' value='submit'>";
    echo "</form>";
    if (isset($errors[6])) {
        echo "<span>$errors[6]</span>";
    }
}

function validate_form()
{
    $errors = [];
    if (is_null(filter_input(INPUT_POST, 'apple', FILTER_VALIDATE_INT)) || (filter_input(INPUT_POST, 'apple', FILTER_VALIDATE_INT)) === false || $_POST['apple'] < 0) {
        $errors[0] = "Number of apple should be a integer >= 0";
    } else {
        $_SESSION['apple'] = $_POST['apple'];
    }
    if (is_null(filter_input(INPUT_POST, 'orange', FILTER_VALIDATE_INT)) || (filter_input(INPUT_POST, 'orange', FILTER_VALIDATE_INT)) === false || $_POST['orange'] < 0) {
        $errors[1] = "Number of orange should be a integer >= 0";
    } else {
        $_SESSION['orange'] = $_POST['orange'];
    }
    if (is_null(filter_input(INPUT_POST, 'banana', FILTER_VALIDATE_INT)) || (filter_input(INPUT_POST, 'banana', FILTER_VALIDATE_INT)) === false || $_POST['banana'] < 0) {
        $errors[2] = "Number of banana should be a integer >= 0";
    } else {
        $_SESSION['banana'] = $_POST['banana'];
    }
    if (is_null(filter_input(INPUT_POST, 'grape', FILTER_VALIDATE_INT)) || (filter_input(INPUT_POST, 'grape', FILTER_VALIDATE_INT)) === false || $_POST['grape'] < 0) {
        $errors[3] = "Number of grape should be a integer >= 0";
    } else {
        $_SESSION['grape'] = $_POST['grape'];
    }
    if (is_null(filter_input(INPUT_POST, 'pear', FILTER_VALIDATE_INT)) || filter_input(INPUT_POST, 'pear', FILTER_VALIDATE_INT) === false || $_POST['pear'] < 0) {
        $errors[4] = "Number of pear should be a integer >= 0";
    } else {
        $_SESSION['pear'] = $_POST['pear'];
    }
    if (is_null(filter_input(INPUT_POST, 'kiwi', FILTER_VALIDATE_INT)) || (filter_input(INPUT_POST, 'kiwi', FILTER_VALIDATE_INT)) === false || $_POST['kiwi'] < 0) {
        $errors[5] = "Number of kiwi should be a integer >= 0";
    } else {
        $_SESSION['kiwi'] = $_POST['kiwi'];
    }
    if ($_POST['apple'] == 0 && $_POST['orange'] == 0 && $_POST['banana'] == 0 && $_POST['grape'] == 0 && $_POST['pear'] == 0 && $_POST['kiwi'] == 0) {
        $errors[6] = "You should order at least 1 item!";
    }
    if ($_POST['name'] == '') {
        $errors[7] = "Please enter your name";
    } else {
        $_SESSION['name'] = $_POST['name'];
    }
    if ($_POST['userID'] == '') {
        $errors[8] = "Please enter your user id";
    } else {
        $_SESSION['userID'] = $_POST['userID'];
    }
    return $errors;
}

function confirm_form()
{
    echo "<h3>Confirm order</h3>";
    foreach ($_SESSION as $key => $value) {
        echo "$key: $value<br><br>";
    }
    echo "<form method='POST' action='$_SERVER[PHP_SELF]'>";
    echo "<input type='submit' name='submit' value='Back'>";
    echo "<input type='submit' name='submit' value='Confirm'>";
    echo "</form>";
}

function process_form()
{
    try {
        $db = new PDO('mysql:host=localhost', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Fail to connect to database: " . $e->getMessage();
    }

    try {
        $sql = "CREATE DATABASE IF NOT EXISTS orders_db;
                USE orders_db;
                CREATE TABLE IF NOT EXISTS Orders (
                    Customer_ID VARCHAR(10) PRIMARY KEY,
                    Apple INT,
                    Orange INT,
                    Banana INT,
                    Grape INT,
                    Pear INT,
                    Kiwi INT
                );
                CREATE TABLE IF NOT EXISTS Customer_order (
                    Customer_ID VARCHAR(10),
                    Customer_Name VARCHAR(30),
                    PRIMARY KEY(Customer_ID, Customer_Name),
                    FOREIGN KEY(Customer_ID) REFERENCES Orders(Customer_ID)
                );";
        $db->exec($sql);
    } catch (PDOException $e) {
        echo "Fail to create database: " . $e->getMessage();
    }

    try {
        $insert = "INSERT INTO orders_db.Orders VALUES (?,?,?,?,?,?,?);";
        $stmt = $db->prepare(($insert));
        $stmt->execute([$_SESSION['userID'], $_SESSION['apple'], $_SESSION['orange'], $_SESSION['banana'], $_SESSION['grape'], $_SESSION['pear'], $_SESSION['kiwi']]);
        $insert = "INSERT INTO orders_db.Customer_order VALUES (?,?);";
        $stmt = $db->prepare(($insert));
        $stmt->execute([$_SESSION['userID'], $_SESSION['name']]);
        echo "<h1>Thank you!</h1><h3>Your order is well received.</h3>";
    } catch (PDOException $e) {
        echo "Fail to insert data into database: " . $e->getMessage();
    }
}

?>