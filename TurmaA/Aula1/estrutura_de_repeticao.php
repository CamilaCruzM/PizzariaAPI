<?php
if(isset($_POST["btncalcular"]
{
  $numero=$_POST['txtnumero'];
    $cont=0;  
    
    //While
    while($cont<=20)
    {
        $resultado=$resultado."<br>";
        $cont=$cont+1;
    }
    
    echo("Repetição utilizando While<br><br>");
    echo($resultado);
}
    

   
?>

<html>
    <head>
        <title>Estrutura de repetição</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="frmrepeticao" method="post" action="estrutura_de_repeticao.php">
            <input type="text" name="txtnumero" value="">
            <br>
            <input type="submit" name="btncalcular" value="Calcular">
        </form>
    </body>
</html>