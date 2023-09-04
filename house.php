<?php
    include_once 'check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="house.css">
    <link rel="stylesheet" href="reset.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        
        <?php
            $sql = new mysqli('localhost', 'root', 'root', 'houses');
            

            $id = $_GET['id'];
            if($idhome != null)
                $id = $idhome;
            $select = $sql->query("SELECT * FROM `house` WHERE `id` = '$id'");

            $house = $select->fetch_assoc();
        ?>
        <header class="header">
            <h1 class="title"><?php echo $house['name']?></h1>
            <a href = "index.php"class="toAdmin">Назад</a>
        </header>    

        <div class="house">
            <img src="./<?php echo $house['url']?>.jpg" alt="" class="homeImg">
            <div class="right">
                <div class="info">
                    <div><?php echo $house['address']?></div>
                    <p><?php echo $house['description']?></p>
                    <div><?php echo $house['cost']?>₽/сутки</div>
                </div>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" class = "form">
                    <?php echo $err['success']; ?>
                    <div>
                        <input type="text" placeholder = "Введите имя" class = "input" name = "name" id ="name">
                        <?php echo $err['name'] ?>
                    </div>
                    
                    <div>
                        <input type="text" placeholder = "Введите номер телефон" class = "input" name = "phone" id ="phone">
                        <?php echo $err['phone'] ?>
                    </div>
                    
                    <div>
                        <input type="date" class = "input"  name = "start" id ="start">
                        <?php echo $err['start'] ?>
                    </div>
                    
                    <div>
                        <input type="date" class = "input"  name = "end" id ="end">
                        <?php echo $err['end'] ?>
                    </div>
                    
                    <input type="hidden" name= "id" value=<?php echo $house['id']?>>
                    <button type = "submit" class = "btn">Забронировать</button>
                </form>
                
                <h2 class="titleTwo">Поддтвержденные бронирования</h2>

                <table>
                    <tr>
                        <th>Дата начала</th>
                        <th>Дата конца</th>
                        
                    </tr>
                        <?php 
                            $selectbook = $sql->query("SELECT * FROM `book` WHERE `id_house` = '$id' AND `ok_date` IS NOT NULL");

                            while($book = $selectbook->fetch_assoc()):
                        ?>
                    <tr>

                        <td><?php echo $book['start_date']?></td>
                        <td><?php echo $book['end_date']?></td>
                        
                    </tr>
                    <?php endwhile;?>
                </table>
                
            </div>
        </div>
            
        
        <?php 
        $sql->close();?>
        
    </div>
</body>
</html>