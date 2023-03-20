<?php
require_once('__connec.php');
$pdo = new \PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);

$query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";

$statement = $pdo->prepare($query);

$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();

echo "<h2>Successfully added a new friend!<h2>";
echo "<p>You're going to be redirect to the index.</p>";
header('refresh:3;url=index.php');