<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="components/_css/style.css">
    <title>Agendamento</title>
    <?php
        if(isset($_POST['Ok'])){
            header('Location:index.html');
        }
    ?>

</head>
<body style="text-align:center">
    <h1 >Agendamento efetuado com sucesso !</h1>
    <br>
    <div style="text-align:center">
    <form method="post" style="text-align:center">
    <input type="submit" value="Ok" name="Ok" style="text-align:center">
    </form>
    
    </div>
    
    
    
</body>
</html>