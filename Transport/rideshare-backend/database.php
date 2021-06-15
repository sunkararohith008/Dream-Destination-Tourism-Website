<?php
    $dsn = 'mysql:host=db5001301244.hosting-data.io;dbname=dbs1109581';
    $username = 'dbu122451';
    $dbpassword = 'Arshrohi@2020';

    try {
        $db = new PDO($dsn, $username, $dbpassword);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
