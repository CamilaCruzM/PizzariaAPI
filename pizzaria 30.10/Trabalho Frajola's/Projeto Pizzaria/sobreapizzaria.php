<?php require_once('cms/modulo.php');

Conexao_Banco(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sobre a Pizzaria</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <meta charset="utf-8">
    </head>
    <body>
         <header>
             <div id="principal">
                 <!-----------------------Logo------------------>
                     <div id="logo">
                        <img src="imagem/loginho.png" alt="Pizzaria Frajola's" title="Pizzaria Frajola's">
                        </div>
                 <!---------------------Menu---------------->
                      <nav id="menu">
                        <div class="caixa_menu">
                            <a href="pizzaria.php.php" class="link">
                                Home
                            </a>
                            </div>
                            <div class="caixa_menu">
                                <a href="curiosidades.php" class="link">
                                    Curiosidades
                                </a>
                            </div>
                        <div class="caixa_menu">
                            <a href="nossosambientes.php" class="link">
                                Nossos Ambientes
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="pizzadomes.php" class="link">
                                A pizza do mês
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="sobreapizzaria.php" class="link">
                                 Sobre a Pizzaria
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="promocoes.php" class="link">
                                Promoções
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="faleconosco.php" class="link">
                               Fale Conosco
                            </a>
                        </div>
                </nav>
            </div>
        </header>
        <!-----------------------------------Conteudo--------------------->
        <div id="conteudo">
            <div id="sobrenos">
                <?php
                    $sql="select * from tbl_sobre";
                
                        $select=mysql_query($sql);
                
                while ($rs=mysql_fetch_array($select)){
                    
       
                    
        
                ?>
                <!-------------------Historia--------------------->
                <div class="destaques">
                    <h3><?php echo($rs['titulo']) ?></h3>
                </div>
                <?php echo($rs['conteudo']) ?>
            </div>
            <?php } ?>
                <!---------------------------------Entre as Melhores------>
               
        </div>
        <!-------------------------------Rodapé------------------>
        <footer></footer>
    </body>
</html>