<?php

include_once("conexao.php");

$nome = addslashes($_POST['nome']) ;
$email = addslashes($_POST['email']) ;
$telefone = addslashes($_POST['telefone']) ;


$sql = "insert into cadastro (nome,email,telefone) values ('$nome','$email',$telefone)";
$cadastrar = mysqli_query($conexao,$sql);

$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);

if(isset($_POST['Ok'])){
    header('Location:index.html');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="components/_css/style.css">
    <link rel="stylesheet" href="menudropdown.css">

</head>

<body>
    <header>
        <div id="title">
            <div class="title1">
                <h1 id="logo">DHEL</h1>
            </div>
            <div class="title1">
                <h3></h3>
            </div>
        </div>
        <nav class="web">
            <ul style="width: 500px;">
                <li style="display: inline-block;
                margin: 5px;">
                    <a href="index.php" >Início</a>
                </li>
                <li style="display: inline-block;
                margin: 5px;">
                    <a href="servico.html" >Serviços</a>
                </li>
                <li style="display: inline-block;
                margin: 5px;">
                    <a href="agendar.php" target="_blank" id="inscreva-se-btn" >Agendar um horário</a>
                </li>
                <li style="display: inline-block;
                margin: 5px;">
                    <a href="cadastro.php" target="_blank" id="inscreva-se-btn" >Cadastre-se</a>
                
                </li>
                
            </ul>
        </nav>
       
        <nav class="mobile" style="z-index:10 ; clear: both;">
                <input type="checkbox" name="radio-btn" class="radio">
                <img src="components/images/menu_horizontal.png" class="menu">
                <img src="components/images/menu_vertical.png" class="menuv" >
                <a href="default.php" class="logo">Cabeleireiros Unissex</a>
            
            <ul class="ulprincipal">
                <li class="liprincipal">
                    <a href="index.php" class="dropcalculadoras">Início</a>
                </li>
                <li class="liprincipal">
                    <a href="servico.html" class="dropcalculadoras">Serviços</a>
                </li>   
                <li class="liprincipal">
                    <a href="agendar.php" target="_blank" class="dropcalculadoras">Agendar um horário</a> 
                </li>
                <li class="liprincipal">
                    <a href="cadastro.php" target="_blank"  class="dropcalculadoras">Cadastre-se</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section>
            <h1>Confirmação de Cadastro</h1>
            <hr><br><br>

            <?php

                if ($linhas ==1){
                    print "Cadastro efetuado com sucesso!";
                }else{
                    print "Cadastro não efetuado. <br> Já existe um usuário com este email!";
                }
            ?>
                <br>
                <div style="text-align:center">
                <form method="post" style="text-align:center">
                <input type="submit" value="Ok" name="Ok" style="text-align:center">
                </form>
                
                </div>

        </section>

    </div>

</body>

</html>