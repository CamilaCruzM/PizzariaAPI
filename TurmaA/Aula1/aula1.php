<?php
//Comentario em linha
    
/*
Comentario de várias linhas de código
*/

//isset Serve para verificar a existencia de um objeto
if(isset($_GET["txtnome"]))
{
    


//Para retirar uma variavel do formulario usando o modo 
//Get utilizamos o comando $_GET
//Toda variavel deve ser iniciada com o $
$nome=$_GET["txtnome"];
echo("Bem Vindo ao PHP, <font color=red>".$nome."</font><br><br>");

echo("Bem Vindo ao PHP, <span class='nome'>".$nome."</span><br></br>");
}
?>

<html>
    <head>
        <title>Aula 01</title>
        <meta charset="utf-8">
        <style>
            .nome{
                font-family: fantasy;
                font-size: 12px;
                color: aqua;
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <form name="frmaula1" method="get" action="aula1.php">
        <table>
        <tr>
            <td>Digite seu nome:</td>
              <td><input type="text" name="txtnome" value="" maxlength="12" size="30"></td>
        </tr>
        <tr>
            <td><input type="submit" name="btnsalvar" value="Salvar"></td>
        </tr>
        </table>
        </form>
    </body>
</html>