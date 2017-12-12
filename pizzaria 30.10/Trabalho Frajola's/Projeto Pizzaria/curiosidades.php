<?php require_once('cms/modulo.php');

Conexao_Banco(); ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Curiosidades</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>
    <body>
        <header>
             <div id="principal">
               <!---logo----->
                     <div id="logo">
                        <img src="imagem/loginho.png" alt="Pizzaria Frajola's" title="Pizzaria Frajola's">
                        </div>
               <!---menu----->
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
        <!---conteudo----->
        <div id="conteudo">
           <!---acontecimentos decada----->
            <div id="acont">
                <div class="destaque">
                    <h1>Acontecimentos</h1>
                </div>
                <div id="img_curiosidades">
                    <?php 
                        $sql = "SELECT * FROM tbl_curiosidade";
                    
                    $select=mysql_query($sql);
                    
                    while($rs=mysql_fetch_array($select)){
                    
                    ?>
                    <div id="suporte1">
                        <img src="cms/<?php echo($rs['imagem']) ?>" alt="satélite" title="1satélite meterologico">
                        <div class="desc_acont">
                           <?php  echo ($rs['titulo'])?> 
                            <?php echo ($rs['conteudo'])?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
           <!--- arte -->
            <div id="arte_cultura">
                <div class="destaque">
                    <h1>Arte e Cultura</h1>
                </div>
                <div class="fatos">
                    <!---decada 60----->
                   <div class="texto">
                       <h3>Decada 60</h3>
                    </div>
                    <ul>
                        <li>Em dezembro de 1967 é criada a FUNAI (Fundação Nacional do Índio)</li>
                        <li>Em abril de 1968, é lançado um grande sucesso do cinema: 2001, Uma Odisséia 
                            no Espaço, de Stanley                                                          Kubrick.</li>
                        <li>Inauguração do MASP (Museu de Arte de São Paulo) em 7 de novembro de 1968.</li>
                        <li>O movimento hippie ganha força nesta década.</li>
                    </ul>
                </div>
                <div class="fatos">
                   <!---decada 70----->
                    <div class="texto">
                       <h3>Decada 70</h3>
                    </div>
                    <ul>
                        <li>Março de 1970 - Depois de muito sucesso, acaba a banda de rock Beatles.</li>
                        <li>16 de agosto de 1977 - Morre o rei do rock, ElvisPresley.</li>
                    </ul>
                </div>
                <div class="fatos">
                   <!---decada 80----->
                    <div class="texto">
                       <h3>Decada 80</h3>
                    </div>
                    <ul>
                        <li>1980: o arquiteto brasileiro Oscar Niemeyer cria o Memorial JK (Juscelino Kubitschek).</li>
                        <li>Janeiro de 1982: fundação do Museu Afro-brasileiro em Salvador (Bahia).</li>
                        <li>Em 1980, o escritor italiano Umberto Eco lança o livro O nome da rosa, um dos grandes sucessos                          literários da década de 1980.</li>
                    </ul>
                </div>
            </div>
            #Musica
            <div id="musica">
                <div class="destaque">
                    <h1>Música</h1>
                </div>
                <div id="sup_music">
                    <!---sucessos 60----->
                    <div class="texto">
                       <h3>Decada 60</h3>
                    </div>
                    <ul>
                       <li>Like a Rolling Stone (Bob Dylan)</li>
                       <li>The house of the reising sun (the animals)</li>
                       <li>quele abraço (Gilberto Gil)</li>
                       <li>I want you Back (Jackson 5)</li>
                       <li>My Way (Frank Sinatra)</li>
                        <li>Banho de Lua (Celly Campello)</li>
                        <li>Biquini de Bolinha Amarelha (Ronnie Cord)</li>
                        <li>Era um garoto (Engenheiros do hawaii)</li>
                  </ul>
                </div>
                    
                </div>
                <div id="sup_music_70">
                    <!---sucessos 70----->
                   <div class="texto">
                      <div class="texto">
                       <h3>Decada 70</h3>
                    </div>
                       <ul>
                        <li>Imagine (JohnLennon)</li>
                        <li>Skyline Pigeon (Elton John)</li>
                        <li>We are the Champions (Queen)</li>
                        <li>Detalhes (Roberto Carlos)</li>
                        <li>Azul da cor do mar (Tim Maia)</li>
                        <li>Pai (Fábio Jr)</li>
                        <li>Moça (Wando)</li>
                        <li>Rock & Roll All Nite(Kiss)</li>
                    </ul>
                    </div>
                    
                </div>
                <!---sucessos 80----->
                <div id="sup_music_80">
                    <div class="texto">
                       <h3>Decada 80</h3>
                    </div>
                    <ul>
                        <li>Thriller (Michael Jackson)</li>
                        <li>The Final Coutdown (Europe)</li>
                        <li>Jump (Van Halen)</li>
                        <li>Fade to Black (Metalica)</li>
                        <li>Still Louving You (Scorpions)</li>
                        <li>Sweet Child o' Mine (Guns N' Roses)</li>
                        <li>Como eu quero (Kid Abelha)</li>
                        <li>Um dia de Domingo (Gal Costa e Tim Maia)</li>
                        <li>Dona (Roupa Nova)</li>
                    </ul>
                </div>
            </div>
    
        <!---rodape----->
        <footer></footer>
    </body>
</html>