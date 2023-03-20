<?php

require_once('__connec.php');

$pdo = new \PDO(DSN, USER, PASS);
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>
        <?php
        echo '<ul';
        foreach ($friends as $friend) {
            echo '<li>'. $friend->firstname. ' '.$friend->lastname.'</li>';
        }
        echo '</ul>';
        ?>
        <br />
        <form action="addFriend.php" method="post">
            <label for="firstname">First Name</label>
            <input name="firstname" type="text" placeholder="First Name">

            <label for="lastname">Last Name</label>
            <input name="lastname" type="text" placeholder="Last Name">

            <input type="submit" value="Submit">
        </form>
    </body>