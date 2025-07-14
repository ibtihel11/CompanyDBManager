<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        // Hardcoded login: root / 0000
        if ($username === "root" && $password === "0000") {
            echo "success";
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
            exit();
        }
    }
    echo "Requête invalide.";
?>