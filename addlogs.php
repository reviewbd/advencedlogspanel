<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_type = $conn->real_escape_string($_POST['event_type']);
    $description = $conn->real_escape_string($_POST['description']);

    $query = "INSERT INTO logs (event_type, description) VALUES ('$event_type', '$description')";
    if($conn->query($query)){
        echo "Log inséré avec succès";
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>
