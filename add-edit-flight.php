<?php
require_once 'connection.php';

$id = $_POST['id'] ?? '';

$destination = $_POST['destination'] ?? '';
$departure = $_POST['departure-from'] ?? '';
$airline = $_POST['airline'] ?? '';
$price = $_POST['price'] ?? '';
$departure_date = $_POST['departure-date'] ?? '';
$arrival_date = $_POST['arrival-date'] ?? '';
if ($id) {
    mysqli_query($conn, "UPDATE flights SET destination = '$destination', departure_from = '$departure', airline = '$airline', price = '$price', departure_date = '$departure_date', arrival_date = '$arrival_date' WHERE id = $id ");
    header("Location: flights.php");
    exit();
}else{
    mysqli_query($conn, "insert into flights (destination, departure_from, airline, price, departure_date, arrival_date) values ('$destination', '$departure', '$airline', '$price', '$departure_date', '$arrival_date')");
    header("Location: flights.php");
    exit();
}
?>