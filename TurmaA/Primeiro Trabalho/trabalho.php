    <?php

    if(isset($_POST["btnCalcular"])){
        $valorinicial=$_POST['valorI'];
        $valorfinal=$_POST['valorF'];
        $cresc_decresc=$_POST['chkCres'];
        $resultp="";
        $resultimp="";
    }
       // switch ($cresc_decresc)
         //   case 1:







    ?>


    <html>
        <head>
            <title>
            </title>
            <style>
                #main{
                    width: 430px;
                }
                header{
                    height: 40px;
                    background-color: red;
                    font-family: cursive;
                    font-size: 15px;
                    font-weight: bold;
                    color: aliceblue;
                    text-align: center;
                }
                .numeros{
                    height: 120px;
                    width: 200px;
                    background-color:azure; 
                    overflow: scroll;
                    float:right;
                    color:white;
                }
                #numeros_print{
                    position:fixed;
                    width: 430px;
                }
                #caixa_Dos_Pares{
                }
                #caixa_Dos_Impares{
                }
            </style>
        </head>
        <body>
            <div id="main">
                <header>
                    Pares e impares
                </header>
                <table border="1" id="main" height="100">
                    <form name="frmCalc" method="POST" action="trabalho.php">
                        <tr>
                            <td>
                                Valor Inicial:
                                <select name="valorI">
                                    <option value="0">
                                        Escolha um numero:


                                            <?php
                                           for($cont=1;$cont<501;$cont++){
                                                echo("<option value='".$cont."'>".$cont."</option>");
                                            }
                                        ?>
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input type="radio" name="chkCres" value="1">
                                Crescente
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Valor Final:
                                <select name="valorF">
                                    <option value="0">
                                        Escolha um numero:


                                            <?php
                                            for($cont=80;$cont<1001;$cont++){
                                                echo("<option value='".$cont."'>".$cont."</option>");
                                            }
                                        ?>
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input type="radio" name="chkCres" value="2">
                                Decrescente
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="btnCalcular" value="calcular">
                            </td>
                        </tr>
                    </form>
                    <table border="1" id="main" height="20">
                        <tr>
                            <td>
                                Números Pares
                               <div class="numeros">
                                    <?php 

                                       for($valorinicial;$valorinicial<=$valorfinal;$valorinicial++){

                                           $resultado=$valorinicial%2;
                                         switch ($resultado){
                                             case(0):
                                                echo($valorinicial."<br>");
                                                break;
                                             case(1):
                                                 
                                                 $resultimp=$resultimp.$valorinicial."<br>";
                                                
                                                 
                                                 break;
                                                     
                                                 
                                             
                                                 
                                        }
                                        } 
                                   ?>
                                </div>
                            </td>
                            <td>
                                Números Impares
                                <div class="numeros">
                                    <?php 

                                       
                                             echo($resultimp);
                                             
                                                 
                                        
                                         
                                   ?>

                                </div>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                    <table id="numeros_print" border="1" height="100">
                        <tr>
                            <td>
                                Qtd de numeros pares:

                            </td>

                            <td>
                                Qtd de numeros impares:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Soma dos numeros pares:
                            </td>
                            <td>
                                Soma dos numeros impares:
                            </td>
                        </tr>
                    </table>
                </table>
            </div>
        </body>
    </html>