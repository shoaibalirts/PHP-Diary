<?php
$title = $_POST['title'];
$date = $_POST['date'];
$message = $_POST['message'];
require __DIR__ . '/inc/db-connect.inc.php';
require __DIR__ . '/inc/functions.inc.php';

$query = "INSERT INTO `entries` (`title`, `message`, `date`) VALUES (:title, :message, :date)";
$stmt = $pdo->prepare($query);
$stmt->bindValue('title', $title);
$stmt->bindValue('message', $message);
$stmt->bindValue('date', $date);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
</head>

<body>
    <h1>Data is saved into our system!</h1>
</body>

</html>