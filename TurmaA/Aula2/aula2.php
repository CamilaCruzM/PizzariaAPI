<?php

//DECLARAÇÃO DE VARIÁVEIS.
$media=0;
$situacao="";

//CRIAMOS UMA CONSTANTE CHAMADA CAMP_VAZIO PADRONIZAR A MENSAGEM DE ERRO NA TELA.
define("Campo_Vazio","Inserir Valores Válidos");

/*VERIFICA A EXISTÊNCIA DO BOTÃO DO FORM, SE O BOTÃO EXISTIR É 
PORQUE O USUÁRIO CLICOU NO BOTÃO, E ASSIM NÃO PRECISAMOS VERIFICAR A EXISTÊNCIA DE CADA CAIXA DE TEXTO NO FORM.*/
if(isset($_POST["btncalcular"]))
{
 
    //RESGATANDO OS VALORES EM FORM UTILIZANDO O MÉTODO POST.
    $valor1 = $_POST["txtn1"];
    $valor2 = $_POST["txtn2"];
    $valor3 = $_POST["txtn3"];
    $valor4 = $_POST["txtn4"];
    
    if($valor1=="" || $valor2=="" || $valor3=="" || $valor4==""){
        echo(Campo_Vazio);
        
        //DESTRÓI UMA VARIÁVEL NA MEMÓRIA DO COMPUTADOR.
        unset($valor1);
        unset($valor2);
        unset($valor3);
        unset($valor4);
    }else
    {

    /* PERMITI VERIFICAR OS TIPOS DE DADOS QUE O PHP ATRIBUI NA VARIÁVEL.
    $x=true;
    echo(gettype($valor1));
    */
    
 
    $media =($valor1 + $valor2 + $valor3 + $valor4 )/4;
    //echo($media);

    /*SINAIS NO PHP.
    + 
    -
    *
    /
    % - EXTRAI O MÓDULO DO NÚMERO, QUE SERIA O (MOD).
    */
    
    /*OPERADORES DE COMPARAÇÃO NO PHP.
    == VERIFICA A IGUALDADE (1 == 2). / > MAIOR.
    = VERIFICA A ATRIBUIÇÃO (1 = 2). / < MENOR.
    <= MAIOR OU IGUAL.              / != sIGNIFICA VERIFICAR A DIFERENÇA.
    >= MENOR OU IGUAL.
    */

    /* OPERADORES LÓGICOS NO PHP.
    and - OPERADOR LÓGICO DE "E".
    or -  OPERADOR LÓGICO DE "OU".
    && - OPERADOR LÓGICO DE "E".
    || (PIPE) - OPERADOR LÓGICO DE "OU".
    !(COMPARAÇÃO) - EXCLAMAÇÃO : ANTES DA COMPARAÇÃO FAZ A NEGAÇÃO DO RESULTADO, COMO SE FOSSE O (NOT).
    
    */
        if($media>=7)
        {
            $situacao = "<span class='aprovado''>Aprovado!</span>";
        }else{
            $situacao = "<span class=reprovado>Reprovado!</span>";
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
                color: chartreuse;
            }
            
            .reprovado{
                font-weight: bold;
                color: darkred;
            }
            </style>
    </head>
    <body>
        <form name="frmaula2" method="post" action="aula2.php">
            <table>
                <tr>
                    <td>Calculo de Médias</td>
                </tr>
                 <tr>
                    <td>Nota 1:</td>
                    <td><input type="text" name="txtn1" value="" maxlength="5" size="20"></td>
                </tr>
                 <tr>
                    <td>Nota 2:</td>
                    <td><input type="text" name="txtn2" value="" maxlength="5" size="20"></td>
                </tr>
                <tr>
                    <td>Nota 3:</td>
                    <td><input type="text" name="txtn3" value="" maxlength="5" size="20"></td>
                </tr>
                <tr>
                    <td>Nota 4:</td>
                    <td><input type="text" name="txtn4" value="" maxlength="5" size="20"></td>
                </tr>
                <tr>
                    
                    <td colspan="2"><input type="submit" name="btncalcular" value="Calcular"></td>
                </tr>
                <tr>
                    <td>A média do Aluno é: <?php echo($media); ?> <br>
                        O aluno está: <?php echo($situacao); ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>