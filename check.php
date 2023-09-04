 <?php
    function clear_data($val){
        $val = trim($val);
        $val = stripslashes($val);
        $val = strip_tags($val);
        $val = htmlspecialchars($val);
        return $val;
    }
    
    $idhome = $_POST['id'];
    $name = clear_data($_POST['name']);
    $phone = clear_data($_POST['phone']);
    $start = clear_data($_POST['start']);
    $end = clear_data($_POST['end']);
     
    $pattern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
     
    $err = [];
    $flag = 0;
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if (empty($name)){
            $err['name'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
        }
        if (!preg_match($pattern_phone, $phone)){
            $err['phone'] = '<small class="text-danger">Формат телефона не верный!</small>';
            $flag = 1;
        }
        if (empty($phone)){
            $err['phone'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
        }
        if (empty($start)){
            $err['start'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
        }
        if (empty($end)){
            $err['end'] = '<small class="text-danger">Поле не может быть пустым</small>';
            $flag = 1;
        }
        
        if ($flag == 0){
            
            $sql = new mysqli('localhost', 'root', 'root', 'houses');
            $sql->query("INSERT INTO `book` (`id_house`, `name`, `phone`, `start_date`, `end_date`) VALUES('$idhome', '$name', '$phone', '$start','$end')");

            $sql->close();
            Header("Location:". $_SERVER['HTTP_REFERER']."&mes=success");
        }
    }
    if ($_GET['mes'] == 'success'){
        $err['success'] = '<div>Сообщение успешно отправлено!</div>';
    }
 ?>

<style>
    .text-danger{
        color: red;
        font-size: 10px;
        display: block;
        margin-top: 2px;
    }

</style>