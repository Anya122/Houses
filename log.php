<?php
    $name = $_POST['name'];
    $password = $_POST['password'];
       
            
    $sql = new mysqli('localhost', 'root', 'root', 'houses');
    $result = $sql->query("SELECT * FROM `admin` WHERE `login` = '$name' AND `pass` = '$password'");
    $user = $result->fetch_assoc();
    $sql->close();
    if($user == null)
        header('Location: checkAdmin.php');
    else 
        header('Location: admin.php');
       
 ?>
 
