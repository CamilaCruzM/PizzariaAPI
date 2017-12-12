<?php
//criando funções em PHP
function Calcular($n1,$n2,$operacao)
{
     //Estrutura de decisao usando switch case
    switch($operacao)
            {
                case "somar":
                    $resultado = $n1 + $n2;
                    break;
                
                case "subtrair":
                    $resultado = $n1 - $n2;
                    break;
                    
                case "multiplicar":
                    $resultado = $n1 * $n2;
                    break;
                    
                case "dividir":
                    if($n2==0)
                    {
                        echo(msg_erro);
                        $resultado="0";
                    }else
                    {
                       $resultado = $n1 / $n2; 
                    }
                    break;
            }
    
        return $resultado;
    
}



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
       if($valor1=="" || $valor2=="")
       {
           
           echo(Erro);
           
      
       }else
        {
           $opc = $_GET["rdocalc"];
           
           $resultado=Calcular($valor1,$valor2,$opc);
            
        }
    }
   
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
						
                
                        <input type="radio" name="rdocalc" 
                               <?php  
                               
                               if($opc_somar=="somar")
                               {
                                   echo("checked");
                               }
                               
                               ?> 
                               value="somar" >Somar <br>
                        
                        <input type="radio" name="rdocalc" 
                               <?php 
                               
                               if($opc_subtrair=="subtrair")
                               {
                                   echo("checked");
                               }
                               
                               
                               
                               ?> value="subtrair" >Subtrair <br>
						
                        <input type="radio" name="rdocalc"
                               <?php
                               
                               if($opc_multiplicar=="multiplicar")
                               {
                                   echo("checked");
                               }
                               
                               
                               
                               ?> value="multiplicar" >Multiplicar <br>
						
                        <input type="radio" name="rdocalc" 
                               <?php 
                               if($opc_dividir=="dividir")
                               {
                                   echo("checked");
                               }
                               
                               
                               ?> value="dividir" >Dividir <br><br>
						
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