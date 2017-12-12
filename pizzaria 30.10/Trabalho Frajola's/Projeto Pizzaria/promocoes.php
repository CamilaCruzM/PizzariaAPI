<?php require_once('cms/modulo.php');

Conexao_Banco(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Promoções</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>
    <body>
         <header>
             <div id="principal">
                 <!---logo--->
                     <div id="logo">
                        <img src="imagem/loginho.png" alt="Pizzaria Frajola's" title="Pizzaria Frajola's">
                        </div>
                       <!---menu--->
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
       <!---conteudo--->
        <div id="conteudo">
            <div id="promo">
                <?php
                    $sql="select * from tbl_promocao";
                
                        $select=mysql_query($sql);
                
                while ($rs=mysql_fetch_array($select)){
                    
       
                    
        
                ?>
            </div>
            <div class="desc_promo">
               <?php echo($rs['titulo'])?>
                <?php echo($rs['conteudo']) ?>
            </div>
            <div id="img_promo">
                <img src="cms/<?php echo($rs['imagem']) ?>" alt="fff" title="pizza 4 queijos">
               
            </div>
            
            <?php
                }
            ?>
        </div>
        <!--- rodape --->
        <footer></footer>
    </body>
</html>