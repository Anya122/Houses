<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="title">Админ-Панель</h1>
            <a href = "index.php"class="toAdminn">Назад</a>
        </header>
    <div class="houses">

        
        <?php
            $sql = new mysqli('localhost', 'root', 'root', 'houses');
            $select = $sql->query("SELECT * FROM `house`");

            $checkid = $_GET['id'];
            $idh = $_GET['val'];
            $aaa = '<div>ЭТА ДАТА ЗАНЯТА</div>';
            $arr = [mysqli_num_rows($select)];
            $i = 0;
            while($house = $select->fetch_assoc()):
        
            $arr[$i] = $house;
            $i++;


        ?>
            <div class="house">
                <img src="./<?php echo $arr[$i-1]['url']?>.jpg" alt="" class="homeImg">
                <h2 class="titleHome"><?php echo $arr[$i-1]['name']?></h2>

                <?php 
                    $a = $arr[$i-1]['id'];
                    $selectbook = $sql->query("SELECT * FROM `book` WHERE `id_house` = '$a' AND `ok_date` IS NULL");

                    while($book = $selectbook->fetch_assoc()):
                ?>
                

                <div class="book">
                    <div class="price">Дата начала:<?php echo $book['start_date']?></div>
                    <div class="price">Дата окончания:<?php echo $book['end_date']?></div>
                    <div class="price">Телефон:<?php echo $book['phone']?></div>
                    <div class="price">Пользователь:<?php echo $book['name']?></div>
                    <?php
                        if($idh == $book['id_house'])
                            if($checkid == $book['id']):
                                
                    ?>
                    <div><?php echo $aaa?></div>
                    <?php endif;?>
                </div>
                
                <div class="btns">
                <form method = "post" action="accept.php">
                    <input type="hidden" name= "id" value=<?php echo $book['id']?>>
                    <button type = "submit" class="btnP">Поддтвердить</button>
                </form>

                <form method = "post" action="delete.php">
                    <input type="hidden" name= "id" value=<?php echo $book['id']?>>
                    <button type = "submit" class="btnD">Удалить</button>
                </form>
                </div>

               

                <?php endwhile;?>
                
            </div>
            
        
        <?php endwhile;
        $sql->close();?>
        </div>
        
    </div>
    
</body>
</html>