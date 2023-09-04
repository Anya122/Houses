<?php
    $sql =  new mysqli('localhost', 'root', 'root', 'houses');
    
    $id = $_POST['id'];


 
    $select1 = $sql->query("SELECT * FROM `book` WHERE `id` = '$id'");
    $select = $select1->fetch_assoc();
    $idh = $select['id_house'];
    $first = $select['start_date'];
    $second = $select['end_date'];
    $curDate = $sql->query("SELECT * FROM `book` WHERE `id_house` = '$idh' AND `ok_date` IS NOT NULL AND 
    ((`start_date` <= '$first' AND `end_date` >= '$first') OR 
    (`start_date` <= '$second' AND `end_date` >= '$second') OR
    (`start_date` >= '$first' AND `end_date` <= '$second' ))");
    $date = $curDate->fetch_assoc();
    if($date==null){ 
        $select2 = $sql->query("UPDATE `book` SET `ok_date` = NOW() WHERE `id` = '$id'");
        $sql->close();
        header('Location: admin.php');
    }
   // echo count($date);
   

    header("Location: admin.php?id=$id&val=$idh");

?>