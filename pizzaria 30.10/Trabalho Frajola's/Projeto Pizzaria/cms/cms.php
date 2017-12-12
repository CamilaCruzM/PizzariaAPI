<?php
    error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    session_start('usuario');

?>


<!DOCTYPE html>
<html>
    <head>
        <title>CMS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <div id="titulo">
               <b> CMS</b>-Sistema de Gerenciamento de Site
            </div>
            <div id="logo">
                <img src="imagem/loginho.png" width="100" height="140" alt="fgdfg">
            </div>
        </header>
        <div id="conteudo">
            <div id="photos">
                <figure>
                    <img src="Imagens/content.png" width="90" height="90" alt="ggfh">
                </figure>
                <figure>
                    <img src="Imagens/smartphone.png" width="90" height="90" alt="vdf">
                </figure>
                <figure>
                    <img src="imagem/produto.png" width="90" height="90" alt="bb">
                </figure>
                <figure>
                    <img src="Imagens/Livro.png" width="90" height="90" alt="bgf">
                </figure>
                <div id="bemvindo">
                    Bem vindo,<?php echo $_SESSION['usuario'];?>.
                    
                </div>
                <div id="sair">
                   <a href="cms.php" class="link">
                        Logout
                    </a>
                </div>
            </div>
            <div id="menus">
                <div class="titulo_menu">
                    <a href="cms.php" class="link">
                         Adm.
                        Conteúdo
                    </a>
                </div>
                <div class="titulo_menu">
                   <a href="faleconosco.php">
                        Adm.
                    Fale Conosco
                   </a>
                </div>
                <div class="titulo_menu">
                  <a href="produt.php" class="link">
                          Adm.
                        Produtos
                    </a>
                </div>
                <div class="titulo_menu">
                   <a href="user.php">
                        Adm.
                        Usuários
                    </a>
                </div>
            </div>
            <div id="sla">
                <div id="testeAlinha">
                    <div id="teste">
                        <div class="photo">
                            <img src="imagem/loginho.png" alt="ds">
                        </div>
                        <div class="texto">
                            <a href="curiosidade.php" class="link">
                                curiosidades
                            </a>
                        </div>
                    </div>
                
                    <div id="teste">
                        <div class="photo">
                            <img src="imagem/loginho.png" alt="ds">
                        </div>
                        <div class="texto">
                            <a href="sobre.php" class="link">
                                Sobre a Pizzaria
                            </a>
                        </div>
                    </div>
                </div>
                 <div id="teste">
                    <div class="photo">
                        <img src="imagem/loginho.png" alt="ds">
                    </div>
                    <div class="texto">
                        
                        <a href="promocoes.php" class="link">
                            Promoções
                        </a>
                    </div>
                </div>
                 <div id="teste">
                    <div class="photo">
                        <img src="imagem/loginho.png" alt="ds">
                    </div>
                    <div class="texto">
                        <a href="faleconosco.php" class="link">
                            Fale Conosco
                        </a>
                    </div>
                </div>
                 <div id="teste">
                    <div class="photo">
                        <img src="imagem/loginho.png" alt="ds">
                    </div>
                    <div class="texto">
                        <a href="ambiente.php" class="link">
                            Nossos Ambientes
                        </a>
                    </div>
                </div>
                <div id="teste">
                    <div class="photo">
                        <img src="imagem/loginho.png" alt="yrt">
                    </div>
                    <div class="texto">
                        <a href="pizzames.php" class="ff">
                            Pizza do Mes
                        </a>
                    </div>
                </div>
            </div> 
            <footer>
                Desenvolvido por:Camila Cruz
            </footer>
        </div>
    </body>
</html>