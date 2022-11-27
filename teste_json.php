<?php
$json_str = '{"id":1, "title":"cabelo1", "image_url": "https://ath2.unileverservices.com/wp-content/uploads/sites/2/2016/05/4-tratamentos-de-cabelo-para-fazer-no-salao.jpg", "created_at":"2022-11-26T12:16.263Z", "updated_at":"2022-11T12:36:16.263Z"}';

//faz o parsing na string, gerando um objeto PHP
$obj = json_decode($json_str);

//imprime o conteúdo do objeto


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <tr>
            <td>
                Id : 
            </td>
            <td>
                <?php echo "$obj->id"; ?>
            </td>
        </tr>
        <br>
        <tr>
            <td>
                Título :
            </td>
            <td>
                <?php echo " $obj->title"; ?>

            </td>
        </tr>
        <br>
        <tr>
            <td>
                Imagem : 

            </td>
            <td>
            <img src="<?php echo $obj->image_url ;?>" style="width:100px; height:100px ;"></img>
            </td>
        </tr>
        <br>
        <tr>
            <td>
               Criado em :

            </td>
            <td>
                <?php echo $obj->created_at; ?>

            </td>
        </tr>
        <br>
        <tr>
            <td>
                Atualizado em :
            </td>
            <td>
                <?php echo $obj->updated_at; ?>

            </td>
        </tr>
        
    </section>
    
    
</body>
</html>