<?php
    //Comentários em Linha.
    /*Comentário em 
    várias linhas de programação.
    */

//O comando isset verifica a existência de um objeto ou variável em php.
if(isset($_GET["txtnome"]))
{

    //Toda variável deve ser iniciada por $.
    /*Para pegar o valor digitado pelo usuário na caixa de texto via 
    GET usamos o comando $_GET["].
    */
    //print_r("Bem vindo ao PHP, ".$nome); Para escrever algo na tela em php usamos o echo ou print_r.

    $nome = $_GET["txtnome"];
    echo("Bem vindo ao PHP, <font color='blue'>".$nome."</font><br><br>");
    print_r("Bem vindo ao PHP, <span class='trocaCor'>".$nome."</span>");

}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Aula 01</title>
        <style>
            .trocaCor{
                font-family: verdana;
                color: #159687;
            }
        </style>
    </head>
    <body>    
    </body>
    <form name="frmaula1" method="get" action="aula1.php"> 
       <table>
            <tr>
                <td colspan="2" align="center">Cadastros</td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="txtnome" value=""> </td>
            </tr>
            <tr>
                <td><input type="submit" name="btnsalvar" value="Salvar"></td> 
            </tr>
        </table>      
    </form>    
</html>