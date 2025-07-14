<?php
    $host="localhost";
    $user="root";
    $pwd="0000";
    $dbname="management_system_db";
    $dns="mysql:host=$host;dbname=$dbname";
    try {
        $pdo=new PDO($dns,$user,$pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        $msg='Erreur '.$e->getFile().' ligne '.$e->getLine().': '.$e->getMessage();
        die($msg);
    }
?>