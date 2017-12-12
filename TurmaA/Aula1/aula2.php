<?php
$media="";
$situacao="";
//Criamos uma constante chamada Campo_Vazio para padronizar a mensagem de erro na tela
define("Campo_Vazio","Digite todas as notas");
    
//Verifica a existencia do botao no post do form 
//se  o botao existir é pq o usuario clicou no botao
//de cada caixa de texto no form
if(isset($_POST["btcalcular"]))
{
//Resgatando valores em form utilizando o metodo POST
$valor1 = $_POST["txtn1"];
$valor2 = $_POST["txtn2"];
$valor3 = $_POST["txtn3"];
$valor4 = $_POST["txtn4"];

if($valor1==""|| $valor2==""|| $valor3==""|| $valor4=""){
    echo(Campo_Vazio);
    // unset Destroi uma variavel da memoria do computador
    unset($valor1);
    unset($valor2);
    unset($valor3);
    unset($valor4);
}else
{     
/*echo(gettype($valor1));
gettype permite verificar o tipo de dados que o php atribui a variavel
$x=45;
echo(gettype($x));
*/

$media = ($valor1 + $valor2 + $valor3 + $valor4)/4;
/*
Sinais no PHP
+
-
*
/
% extrai o modulo do número, que seria o mod


Operadores de Comparação no PHP
== significa verificar a igualdade
>
<
<=
>=
!= significa verificar a diferença

Operadores lógicos no PHP
and  operador lógico "E"
or
&& operador lógico "E"
|| (PIPE) operador de lógico "OU"
!(COMPARAÇÃO) EXCLAMAÇÃO antes da COMPARAÇÃO faz a negação do resultado, como se fosse o NOT
*/
// @ omite o erro na tela

if($media>=7)
    {
       $situacao="<span class='aprovado'>Aprovado</span>";
    }else{
        $situacao="<span class='reprovado'>Reprovado</span>" ;
        }
    }
}
?>
<html>
    <head>
        <title>Aula 2</title>
        <meta charset="utf-8">
        <style>
            .aprovado{
                font-weight: bold;
                color: green;
            }
            .reprovado{
                font-weight: bold;
                color: red;
            }
        </style>
    </head>
    <body>
        <form name="frmaula2" method="post" action="aula2.php">
            <table border="1" width="100" height="100">
                <tr>
                    <td colspan="2" align="center">Cálculo de Médias:</td>
                </tr>
                 <tr>
                    <td>Nota 1:</td>
                    <td><input type="text" name="txtn1" value="" maxlength="1" size="50"></td>
                </tr>
                 <tr>
                    <td>Nota 2:</td>
                    <td><input type="text" name="txtn2" value="" maxlength="1" size="50"></td>
                </tr>
                <tr>
                    <td>Nota 3:</td>
                    <td><input type="text" name="txtn3" value="" maxlength="1" size="50"></td>
                </tr>
                <tr>
                    <td>Nota 4:</td>
                    <td><input type="text" name="txtn4" value="" maxlength="1" size="50"></td>
                </tr>
                <tr>
                    
                    <td colspan="2"><input type="submit" name="btcalcular" value="Calcular"></td>
                </tr>
                <tr>
                    <td colspan="2">Amédia do Aluno é: <?php echo($media); ?></td>
                </tr>
                <tr>
                    <td colspan="2">O aluno está: <?php echo($situacao); ?></td>
                </tr>
            </table>
        </form>
    </body>
</html>