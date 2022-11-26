<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="components/_css/style.css">
    <link rel="stylesheet" href="menudropdown.css">
</head>

<body>

    <?php
        include_once("conexao.php");
        /*mysqli_close($conexao);*/

        if(isset($_POST['Enviar'])){
            $servico = addslashes($_POST['servico']);
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);
            $sexo = addslashes($_POST['sexo']);
            $data = $_POST['data'];
            $horario = $_POST['horario'];
            $descricao = addslashes($_POST['descricao']);

            $sql_busca = "SELECT * FROM usuarios WHERE data = '$data' AND horario = '$horario' AND servico = '$servico'";
            $sql_query = $conexao->query($sql_busca) or die("Falha na execução do código SQL: " . $conexao->error .$horario);
            $quantidade = $sql_query->num_rows;

                    if($quantidade ==1){
                        echo "<script>alert('Esse horario esta indisponivel')</script>";

                    }else{
                        $sql = "insert into usuarios (servico,nome,email,telefone,sexo,data,horario,descricao) values ('$servico','$nome','$email','$telefone','$sexo','$data','$horario','$descricao')";
                        $salvar = mysqli_query($conexao,$sql);
                        echo "<script> alert('Agendamento realizado com sucesso!') </script>";
                        header('Location: processa.php');

                    }
            /*$linhas = mysqli_affected_rows($conexao);

            if ($linhas ==1){
                echo "<script>alert('Agendamento efetuado com sucesso!')</script>";
            }else{
                echo "Agendamento não efetuado. <br> Já existe um usuário com este email!";
            }*/

        }
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
	<br>	
    <div class="container">

		<section>
			<h1 class="texth1">Agendamento de Serviço</h1>
            
            <hr><br><br>
			<h3>Selecione o Serviço desejado para ver os horários reservados:</h3>
            <form method="post" action="">
                <input type="radio" name='servico' value='Cabelo'/> Cabelo<br>
                <input type='radio' name='servico' value='Unha'/> Unha<br>
                <input type='radio' name='servico' value='Sobrancelha'/> Sobrancelha<br>
                <input type="hidden" name="filtro" class="campo" id="valor" placeholder="" value="" />
                <input type="submit" value="Ver Horários" class="btn" name="datahora">
            </form>

            <?php
                $filtro = isset($_GET['filtro'])?addslashes($_GET['filtro']):"";
                $sql = "select * from usuarios where servico='$filtro'"; 
                $consulta = mysqli_query($conexao,$sql);
                $registros = mysqli_num_rows($consulta);

                if(isset($_POST['datahora'])){
                    if(isset($_POST['servico'])){
                        $filtro =  addslashes($_POST['servico']);
                        print "Você escolheu:<strong> $filtro</strong><br>";
                        print "Horários Reservados: <strong>$registros</strong><br>" ;
                                    
                        while($exibirRegistros = mysqli_fetch_array($consulta)){
                                                                    
                            $data=$exibirRegistros[6];
                            $data = date("d-m-Y", strtotime($data));
                            $horario=$exibirRegistros[7];
                            $horario = date("H:i", strtotime($horario));
                            print "$data"; 
                            print " -  $horario <br>";                
                        }

                    }else{
                        echo "<script>alert('Escolha algum serviço.') </script>";
                    }
                }
                /*mysqli_close($conexao);*/
                
            ?>

            <hr><br><br>
			<h3>Preencha todos os campos do formulário baixo:</h3>
           
				<form method="post" action="" class="formulario">
                <strong> Selecione o tipo de Serviço</strong><br>
                <input type="radio" name="servico" value="Cabelo" />
                Cabelo
                <br />
                <input type="radio" name="servico" value="Unha" />
                Unha
                <br />
                <input type="radio" name="servico" value="Sobrancelha" />
                Sobrancelha
                <br />
                <br>

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

                <input type="submit" value="Enviar" class="btn" name="Enviar">
            </form>
        
		</section>
		
    </div>
<script>
var radios = document.querySelectorAll("[name=servico]");
for(var x=0; x<radios.length; x++){
   radios[x].onclick = function(){
      document.querySelector("[name=filtro]").value =this.value.split("-").pop();
   }
}

</script>
</body>
</html>