<!DOCTYPE html>
<html>
    <head>
        <title>Frajola's Pizzaria</title>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>
    <body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
        <form>
            <header>
                <div id="principal">
                    <!---Logo----->
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
                    <!---login----->
                    <div id="login">
                        <table id="cad">
                            <tr>
                                <td>Usuário</td>
                                <td><input type="text" name="txtuser" value="" maxlength="10" size="10" placeholder="Digite seu email"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Senha</td>
                                <td><input type="text" name="txtsenha" value="" maxlength="10" size="10" placeholder="Digite sua senha"></td>
                                <td><input type="submit" name="btnOk" value="ok"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </header>
            <!---conteudo----->
            <div id="conteudo">
               <!--- slide -->
                <div id="slide">
                      <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
                        <script src="js/jssor.slider-26.1.5.min.js" type="text/javascript"></script>
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {

                                var jssor_1_SlideshowTransitions = [
                                  {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
                                  {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
                                  {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
                                  {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                                  {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                                  {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
                                  {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:$Jease$.$Swing,$Opacity:2,$Round:{$Rotate:0.5}},
                                  {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                                  {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:$Jease$.$Swing,$Opacity:2,$Round:{$Rotate:0.5}},
                                  {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                                  {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
                                  {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
                                  {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
                                  {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
                                ];

                                var jssor_1_options = {
                                  $AutoPlay: 1,
                                  $SlideshowOptions: {
                                    $Class: $JssorSlideshowRunner$,
                                    $Transitions: jssor_1_SlideshowTransitions,
                                    $TransitionsOrder: 1
                                  },
                                  $ArrowNavigatorOptions: {
                                    $Class: $JssorArrowNavigator$
                                  },
                                  $ThumbnailNavigatorOptions: {
                                    $Class: $JssorThumbnailNavigator$,
                                    $Rows: 2,
                                    $Cols: 6,
                                    $SpacingX: 14,
                                    $SpacingY: 12,
                                    $Orientation: 2,
                                    $Align: 156
                                  }
                                };

                                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                                /*#region responsive code begin*/

                                var MAX_WIDTH = 960;

                                function ScaleSlider() {
                                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                                    var containerWidth = containerElement.clientWidth;

                                    if (containerWidth) {

                                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                                        jssor_1_slider.$ScaleWidth(expectedWidth);
                                    }
                                    else {
                                        window.setTimeout(ScaleSlider, 30);
                                    }
                                }

                                ScaleSlider();

                                $(window).bind("load", ScaleSlider);
                                $(window).bind("resize", ScaleSlider);
                                $(window).bind("orientationchange", ScaleSlider);
                                /*#endregion responsive code end*/
                            });
                        </script>
                        
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" alt="trtr" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;">
            <!---- imagens slides-->
            <div>
                <img data-u="image" src="imagem/portuguesa.jpg" alt="gdgg" />
            </div>
            <div>
                <img data-u="image" src="imagem/marguerita.jpg" alt="gdggdddd"/>
            </div>
            <div>
                <img data-u="image" src="imagem/pizza-pernil-com-jack.jpg" alt="gdggdd" />
            </div>
            <div>
                <img data-u="image" src="imagem/calabresa.jpg" alt="gdggd"/>
            </div>
            <div>
                <img data-u="image" src="imagem/brocolis.jpg" alt="g" />
            </div>
             <div>
                <img data-u="image" src="imagem/romeu_1.jpg" alt="gd" />
            </div>
             <div>
                <img data-u="image" src="imagem/pizza-4-queijos-610x300.jpg" alt="gdg"/>
            </div>
            
           
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:240px;height:480px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:99px;height:66px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <!-- #endregion Jssor Slider End -->
                </div>
                <!---redes sociais-->
                <div id="part_rede">
                    <div id="redes">
                        <div class="img_redes">
                            <img src="imagem/facebook_icon-icons.com_59205.png" alt="facebook">
                        </div>
                        <div  class="img_redes">
                            <img src="imagem/circle-twitter-512.png" alt="twitter" >
                        </div>
                        <div  class="img_redes">
                             <img src="imagem/Instagram_icon-icons.com_66804.png" alt="instagram" >
                        </div>
                    </div>
                </div>
                <!---menu lateral----->
                <div id="lateral">
                    <div class="opc">Opção 1</div>
                    <div class="opc">Opção 2</div>
                    <div class="opc">Opção 3</div>
                </div>
               <!---imagem pizzaria----->
                <div id="produtos">
                    <div class="img">
                        <div class="caixa">
                            <div class="imagens_pizza">
                                <img src="imagem/1900.jpeg" alt="ggg">
                                
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="nome_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="descricao_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="preco_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                        <div class="caixa">
                            <div class="imagens_pizza" >
                                <img src="imagem/ggfdf.jpg" alt="eeee">
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="info_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="info_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="info_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                        <div class="caixa">
                            <div class="imagens_pizza" >
                                <img src="imagem/IMG_8408-Custom.jpg" alt="ttt">
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="nome_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="descricao_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="preco_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                    </div>
                    <div class="img">
                        <div class="caixa">
                            <div class="imagens_pizza" >
                                <img src="imagem/la-piazza-500x340.png" alt="ggrrr">
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="nome_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="descricao_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="preco_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                        <div class="caixa">
                            <div class="imagens_pizza" >
                                <img src="imagem/pizza-pernil-com-jack.jpg" alt="vdd" >
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="info_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="info_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="info_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                        <div class="caixa">
                            <div class="imagens_pizza" >
                                <img src="imagem/1900.jpeg" alt="vvvv">
                            </div>
                            <div class="detalhes_prod_caixa">
                                <div class="nome_detalhes_prod_caixa">Nome:
                                    Pizza Repolho
                                </div>
                                <div class="descricao_detalhes_prod_caixa">Descrição:
                                    Super saborosa
                                </div>
                                <div class="preco_detalhes_prod_caixa">Preço:
                                    R$24,00
                                </div>
                                <div class="detalhes_detalhes_prod_caixa">Detalhes</div>
                            </div>
                        </div>
                    </div> 
                </div>
            
            </div>
         <!--- rodape----->
          
        </form>
            
         <?php
            include ("rodape.php")
            
            ?>
    </body>
</html>