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
    <?php

        include_once("conexao.php");

        $filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
        $sql = "select * from usuarios where servico='$filtro'";
        $consulta = mysqli_query($conexao,$sql);
        $registros = mysqli_num_rows($consulta);
    ?>
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
			<h1>Agendamento de Clientes</h1>
            
            <hr><br><br>
			<h3>Digite o Serviço desejado e veja os horários reservados:</h3>
            <form method="get" action="">
                 <input type="text" name="filtro" class="campo" required autofocus>
                <input type="submit" value="pesquisar" class="btn">
                
            </form>
            <form method="post" action="processa.php">
                    Selecione o tipo de Serviço<br>
                    <input type="radio" name="servico" value="Cabelo">Cabelo
                    <input type="radio" name="servico" value="Unha">Unha
                    <input type="radio" name="servico" value="Sobrancelha">Sobrancelha
                <br>
                <button method ="get" type="button"  onclick="displayRadioValue()">
                    Veja os horários reservados
                </button>
                <br>
                <div id="result"></div>
        
                <script>
                    function displayRadioValue() {
                        var filtro = document.getElementsByName('servico');
                        
                        for(i = 0; i < filtro.length; i++) {
                            if(filtro[i].checked)
                            document.getElementById("result").innerHTML
                                    = "Você escolheu: "+filtro[i].value;
                        }
                    }
                </script>

                <?php
                                print "Você escolheu:<strong> $filtro</strong><br> Os horários abaixo já estão reservados.<br>";
                                print "Registros encontrados: <strong>$registros</strong><br>" ;
                            
                                
                                while($exibirRegistros = mysqli_fetch_array($consulta)){
                                    
                                    $data=$exibirRegistros[6];
                                    $data = date("d-m-Y", strtotime($data));
                                    $horario=$exibirRegistros[7];
                                    $horario = date("H:i", strtotime($horario));
                                    print "$data"; 
                                    print " -  $horario<br>";                
                                }
                            
                                mysqli_close($conexao);
                                
                ?>
                    <hr><br><br>
                    <input type="text" name="nome" placeholder="Nome" class="campo" maxlength="50" required autofocus><br>
                    <input type="email" name="email" placeholder="Email" class="campo" maxlength="40" required><br>
                    <input type="Interger" name="telefone" placeholder="Telefone" class="campo" maxlength="12" required><br>
                    <input type="text" name="sexo" placeholder="Sexo" class="campo" maxlength="12" required><br>
                    <input type="date" name="data" placeholder="Data" class="campo" maxlength="9" required>Data<br>

                    <select name="horario">
                        <option type="time" value="9:00"class="campo" maxlength="5" required>9:00</option>
                        <option type="time" value="9:30" class="campo" maxlength="5" required>9:30</option>
                        <option type="time" value="10:00" class="campo" maxlength="5" required>10:00</option>
                        <option type="time" value="10:30" class="campo" maxlength="5" required>10:30</option>
                        <option type="time" value="11:00" class="campo" maxlength="5" required>11:00</option>
                        <option type="time" value="11:30" class="campo" maxlength="5" required>11:30</option>
                        <option type="time" value="12:00" class="campo" maxlength="5" required>12:00</option>
                        <option type="time" value="12:30" class="campo" maxlength="5" required>12:30</option>
                        <option type="time" value="14:00" class="campo" maxlength="5" required>14:00</option>
                        <option type="time" value="14:30" class="campo" maxlength="5" required>14:30</option>
                        <option type="time" value="15:00" class="campo" maxlength="5" required>15:00</option>
                        <option type="time" value="15:30" class="campo" maxlength="5" required>15:30</option>
                        <option type="time" value="16:00" class="campo" maxlength="5" required>16:00</option>
                        <option type="time" value="16:30" class="campo" maxlength="5" required>16:30</option>
                    
                    </select>Selecione um horário<br>
                    <textarea type="text" name="descricao" placeholder="Descreva o serviço à ser executado" class="campo"
                        maxlength="255" required></textarea><br><br>

                    <input type="submit" value="Enviar" class="btn">
            </form>
		</section>
    </div>

</body>

</html>