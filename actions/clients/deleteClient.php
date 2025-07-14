<?php
    require "../../connect.php";
    if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "delete from clients where id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    header("Location: ../../views/costumers.php");
    exit();
?>
