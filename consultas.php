<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql = "select * from usuarios where servico  like '%$filtro%' order by data";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);



?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">

    <title>Seviços agendados</title>
    <link rel="stylesheet" href="components/_css/estilo.css">

</head>

<body>
	

    <div class="container">

        <section>
            <h1>Serviços agendados</h1>
            <hr><br><br>

            <form method="get" action="">
			
                Filtrar por Serviço: <input type="text" name="filtro"placeholder="Insira um tipo de serviço"  class="campo" required autofocus>
                <input type="submit" value="pesquisar" class="btn">
				
            </form>
			<form method="get" action="">
		Excluir serviços executados <input type="date" name="antigo" class="campo" required>
        <input type="submit" value="Excluir" class="btn" action="delete">
		</form>

            <?php
                print "Resultado da pesquisa para o serviço <strong>$filtro</strong>:<br><br>";
                print "<strong>$registros</strong> registros encontrados.";
                print "<br><br>";
                
                while($exibirRegistros = mysqli_fetch_array($consulta)){
                
                    $codigo = $exibirRegistros[0];
                    $servico = $exibirRegistros[1];
                    $nome = $exibirRegistros[2];
                    $email = $exibirRegistros[3];
                    $telefone = $exibirRegistros[4];
                    $sexo = $exibirRegistros[5];
                    $data =  $exibirRegistros[6];
                    $horario = $exibirRegistros[7];
                    $data = date("d-m-Y", strtotime($data));
                    $horario = date("H:i", strtotime($horario));
                    $descricao = $exibirRegistros[8];
                     
                    print "<article>";   
                    print "$codigo<br>";
                    print "Serviço: $servico<br>";
                    print "$nome<br>";
                    print "$email<br>";
                    print "Telefone: $telefone<br>";
                    print "Sexo: $sexo<br>";
                    print "Dia: $data<br>";
                    print "Horário: $horario<br>";
                    print "Descrição: $descricao<br>";
                    
                    print "</article>";
                
                }
               
               
                
                ?>

        </section>

    </div>
<?php

$antigo = isset($_GET['antigo'])? addslashes($_GET['antigo']) :"";
$query = " DELETE FROM usuarios WHERE data<='$antigo'";  
$result = mysqli_query($conexao,$query);

 mysqli_close($conexao);
?>


</body>

</html>