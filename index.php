<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <header class="header">
            <h1 class="title">Аренда домиков</h1>
            <form method = "post" action="checkAdmin.php">
                    <input type="hidden" name= "id" value=<?php echo $arr[$i-1]['id']?>>
                    <button type = "submit" class="toAdmin">Админ-панель</button>
            </form>
            
        </header>
        <div class="houses">

        
        <?php
            $sql = new mysqli('localhost', 'root', 'root', 'houses');
            $select = $sql->query("SELECT * FROM `house`");

            $arr = [mysqli_num_rows($select)];
            $i = 0;
            while($house = $select->fetch_assoc()):
        
            $arr[$i] = $house;
            $i++;
        ?>
            <div class="house">
                <img src="./<?php echo $arr[$i-1]['url']?>.jpg" alt="" class="homeImg">
                <h2 class="titleHome"><?php echo $arr[$i-1]['name']?></h2>
                <div class="address"><?php echo $arr[$i-1]['address']?></div>
                <p class="descHome"><?php echo $arr[$i-1]['description']?></p>
                <div class="price"><?php echo $arr[$i-1]['cost']?>₽/сутки</div>

                <form method = "post" action="pereaddress.php">
                    <input type="hidden" name= "id" value=<?php echo $arr[$i-1]['id']?>>
                    <button type = "submit" class="btn">+</button>
                </form>
                
            </div>
            
        
        <?php endwhile;
        $sql->close();?>
        </div>
    </div>
</body>
</html>