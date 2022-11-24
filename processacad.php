<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];


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

    <title>Sistema de Cadastro</title>
    <link rel="stylesheet" href="components/_css/style.css">

</head>

<body>
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