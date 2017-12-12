<?php
if(isset($_POST["btncalcular"]))
{
  $numero=$_POST['txtnumero'];
    $cont=0;
    $resultado="";
    
    //While
    while($cont<=$numero)
    {
        //$resultado=$resultado.$cont."<br>";
        $resultado.= $cont."<br>";
        //$cont=$cont+1;
        $cont+=1;
    }
    
    echo("Repetição utilizando While<br><br>");
    echo($resultado);
    
    $resultado="";
    //For
    for($cont=0;$cont<=$numero;$cont++)
    {
        //$resultado.= $cont."<br>";
        $resultado.=rand(0,$numero)."<br>";
    }
    
     echo("Repetição utilizando For<br><br>");
     echo($resultado);
    
    //O comando rand permite sortear um número dentro de um range
    echo("o número sorteado foi:".rand(0,$numero));
}
     
?>

<html>
    <head>
        <title>Estrutura de repetição</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="frmrepeticao" method="post" action="estrutura.php">
            <input type="text" name="txtnumero" value="">
            <br>
            <input type="submit" name="btncalcular" value="Calcular">
        </form>
    </body>
</html>