
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DHEL Cabeleireiros</title>
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
    <strong>
        <marquee>Somos profissionais da área de beleza e estética. Atuamos no ramo desde 2005, proporcionando aos nossos
        clientes um serviço de altíssima
        qualidade com um ótimo custo beneficio.
        </marquee>
    </strong>
    
    <main>
            <aside>
                <h2 class="sumir"><span><a href="cadastro.php" target="_blank" id="inscreva-se-btn"><li>Cadastre-se</li></span></a>
                para receber as novidades do nosso salão</h2><br>
                <h2><span>Nossa missão:</span></h2>
                <p>Oferecer tratamentos de beleza de alta qualidade, feitos por profissionais altamente treinados e qualificados, em constante melhoria.</p>

                <h2><span> Pilares do nosso estabelecimento:</span></h2>
                <p> Respeito, honestidade, transparência e compromisso com o bem estar</p>

            </aside>
            <body onload="iniciaSlider()">
                <img src="" id="moldura" onclick="troca(1)" alt="foto"></img>
                <script src="funcoes.js"></script>
            </body>    
    </main>

    <footer>
        <br><strong>Endereço:</strong><br>Rua Santa Cruz do monte Castelo, 12 B - Jardim Paraná - São Paulo<br>Tel.
        98546-3550 / 98332-1977<br>&copy; Copyright 2021 HTML.am<br><a href="adm.html">Administrador</a>
        
    </footer>
    <script src="funcoes.js"></script>
</body>   
<!-- Code injecte