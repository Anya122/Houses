<?php
    $sql =  new mysqli('localhost', 'root', 'root', 'houses');
    
    $id = $_POST['id'];

    $select = $sql->query("DELETE FROM `book` WHERE `id` = '$id'");
    $sql->close();

    header('Location: admin.php');

?>