<?php
require_once 'connection.php';
if(!isset($_GET['deleted_id'])) {
    header("Location: manage-db.html");
    exit();
}
$id = (int)$_GET['deleted_id'] ?? '';

mysqli_query($conn, "DELETE FROM flights WHERE id = $id ");
echo $id;
header("Location: flights.php");
exit();
?>