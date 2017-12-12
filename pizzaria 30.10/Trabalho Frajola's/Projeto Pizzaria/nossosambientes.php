<?php require_once('cms/modulo.php');

Conexao_Banco(); ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Nossos Ambientes</title>
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
        <!-- conteudo -->
        <div id="conteudo">
            <div id="ambiente">
                <!---estabelecimentos sudeste--->
                <h1>Nossos Estabelecimentos</h1>
                
                <?php
                    $sql="select a.* , e .* from tbl_ambiente as a , tblestado as e where a.idEstado=e.idEstado";
                
                        $select=mysql_query($sql);
                
                while ($rs=mysql_fetch_array($select)){
                    
       
                    
        
                ?>
                
                <div id="caixa_ambiente">
                    <img src="cms/<?php echo($rs['imagem']) ?>" alt="entrada">
                    <div class="desc_ambiente">
                        Rua: <?php echo($rs['endereco']) ?>, <?php echo($rs['numero']) ?>
                        <?php echo($rs['bairro']) ?>
                        -<?php echo($rs['cidade']) ?> - <?php echo($rs['estado']) ?>
                        Telefone: <?php echo($rs['telefone']) ?>
                    </div>
                </div>
                
                <?php 
                        }
                    ?>
               
                </div>
            </div>
        </div>
       <!---rodape----->
        <footer></footer>
    </body>
</html>