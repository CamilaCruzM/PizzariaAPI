<?php
    //DECLARAÇÃO DAS VARIÁVEIS.
    $resultado=0;
    $opc_somar="";
    $opc_subtrair="";
    $opc_multiplicar="";
    $opc_dividir="";
    $valor1=0;
    $valor2=0;

    define("Erro","INSIRA OS VALORES");

    if(isset($_GET["btncalc"]))//VERIFICA SE O BOTÃO FOI ACIONADO.
    {
       //PARA RESGATAR OS VALORES DA FORM.
        $valor1 = $_GET["txtn1"];
        $valor2 = $_GET["txtn2"];
       
        //TRATAMENTO DE ERRO PARA CAIXAS VAZIAS.
       if($valor1=="" || $valor2==""){
           
           echo(Erro);
      
       }else
        {
           $opc = $_GET["rdocalc"];
            //Estrutura de decisao usando switch case
            switch($opcao)
            {
                case "somar":
                    $resultado = $valor1 + $valor2;
                    $opc_somar="checked";
                    break;
                
                case "subtrair":
                    $resultado = $valor2 - $valor1;
                    $opc_subtrair="checked";
                    break;
                    
                case "multiplicar":
                    $resultado = $valor1 * $valor2;
                    $opc_multiplicar="checked";
                    break;
                    
                case "dividir":
                     $resultado = $valor1 / $valor2;
                    $opc_dividir="checked";
                    break;
            }
            
           
           /* if($opc=="somar")
           {
               $resultado = $valor1 + $valor2;
               $opc_somar="checked";

           }elseif($opc=="subtrair")
           {
               $resultado = $valor2 - $valor1;
               $opc_subtrair="checked";

           }elseif($opc=="multiplicar")
           {
                $resultado = $valor1 * $valor2;
                $opc_multiplicar="checked";

           }elseif($opc=="dividir")
           {
               {
                    $resultado = $valor1 / $valor2;
                    $opc_dividir="checked";      
               }
              
           }

        }
        
    }
   */
?>
<html>
    <head>
        <title>Calculadora</title>
        <meta charset="utf-8">
    </head>
	<body>
		<table cellpadding="0" cellspacing="0" height="200" width="350">
			<tr height="50">
				<td valign="middle" align="center" colspan="2" bgcolor="#162597">
					<font color="#ffffff">
						<b>
							Calculadora Simples.
						</b>
					</font>
				</td>
			</tr>
			<tr>
				<td> </td>
			</tr>
			<tr>
				<td valign="top">
					<form name="frmcalc" method="get" action="calc.php">
						Valor 1:<input type="text" name="txtn1" value="<?php echo($valor1); ?>" > <br>
						Valor 2:<input type="text" name="txtn2" value="<?php echo($valor2); ?>" > <br><br>
						
                
                        <input type="radio" name="rdocalc" <?php echo($opc_somar); ?> value="somar" >Somar <br>
                        
                        <input type="radio" name="rdocalc" <?php echo($opc_subtrair); ?> value="subtrair" >Subtrair <br>
						
                        <input type="radio" name="rdocalc" <?php echo($opc_multiplicar); ?> value="multiplicar" >Multiplicar <br>
						
                        <input type="radio" name="rdocalc" <?php echo($opc_dividir); ?> value="dividir" >Dividir <br><br>
						
						<input type="submit" name="btncalc" value ="Calcular" >
                        
                        <input type="reset" name="btnlimpar" value="Limpar">
					</form>
				</td>
					
				<td align="center" valign="top" bgcolor="#162597">
					<font color="#ffffff">
						Resultados <br>
						<h1>
							<center>
								<?php 
                                    echo($resultado);
                                ?>
							</center>
						</h1>
					</font>
				</td>
			</tr>
		</table>
	</body>
</html>