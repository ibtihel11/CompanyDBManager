<?php
require "../../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET["id"];

    // Fetch and validate inputs
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $telephone = isset($_POST["telephone"]) ? trim($_POST["telephone"]) : '';
    $adresse = isset($_POST["adresse"]) ? trim($_POST["adresse"]) : '';

    if ($nom !== '' && is_numeric($telephone)) {
        // Prepare and execute update query
        $sql = "update clients set name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $email, PDO::PARAM_STR);
        $stmt->bindParam(3, $telephone, PDO::PARAM_STR);
        $stmt->bindParam(4, $adresse, PDO::PARAM_STR);
        $stmt->bindParam(5, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    header("Location: ../../views/costumers.php");
    exit();
}
?>
