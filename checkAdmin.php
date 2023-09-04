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
        
    
        <header class="header">
            <a href = "index.php"class="toAdmin">Назад</a>
        </header>    

        <div class="house">
    
            <div class="right">
                
                <form action="log.php" method = "post" class = "form">
                
                    <div>
                        <input type="text" placeholder = "Введите логин" class = "input" name = "name" id ="name">
                    </div>
                    
                    <div>
                        <input type="password" placeholder = "Введите пароль" class = "input" name = "password" id ="password">
                    </div>
                
                    <button type = "submit" class = "btn">Войти</button>
                </form>
                
              

            
                
            </div>
        </div>
            
        
        
    </div>
</body>
</html>