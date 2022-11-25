<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql = "select * from cadastro where email  like '%$filtro%' order by email";
$consultacad = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consultacad);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários cadastrados</title>
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
            <h1>Consultas</h1>
            <hr><br><br>

            <form method="get" action="">
                Filtrar por Email: <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="pesquisar" class="btn">
                <input type="submit" value="Apagar" class="btn" action="delete"><br>
            </form>

            <?php
                print "Resultado da pesquisa para o email <strong>$filtro</strong>:<br><br>";
                print "$registros registros encontrados.";
                print "<br><br>";

                while($exibirRegistros = mysqli_fetch_array($consultacad)){

                    $codigo = $exibirRegistros[0];

                    $nome = $exibirRegistros[1];
                    $email = $exibirRegistros[2];
                    $telefone = $exibirRegistros[3];


                    print "<article>";
                    print "$codigo<br>";

                    print "Nome: $nome<br>";
                    print "Email: $email<br>";
                    print "Telefone: $telefone<br>";

                    print "</article>";

                }

                mysqli_close($conexao);

                ?>

        </section>

    </div>

</body>

</html>