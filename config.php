<?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'fivem_logs';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>
