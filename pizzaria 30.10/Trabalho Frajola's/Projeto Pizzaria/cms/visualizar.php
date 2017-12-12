<?php

require_once('modulo.php');

Conexao_Banco();

$chkfeminino="";
$chkmasculino="";

$resgata=$_GET['id'];
//echo($resgata);

$sql="select * from tblfaleconosco where id=".$resgata;
$select= mysql_query($sql);
//echo($sql);
$rsRetorno=mysql_fetch_array($select);

$sexo=$rsRetorno['sexo'];

if($sexo == "M")
{
    $chkmasculino = "checked"; 
}else if($sexo == "F"){
    $chkfeminino = "checked";
}

?>
<html>
    <head>
        <title>Visualizar</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_visualizar.css">
    </head>
    <body>
        <div id="principal">
            <div class="teste">
                <p>Nome</p>
                <div class="exibir"><?php echo($rsRetorno['nome']) ?>
                </div>
            </div>
             <div class="teste">
                <p>Telefone</p>
                <div class="exibir"><?php echo($rsRetorno['telefone']) ?></div>
            </div>
             <div class="teste">
                <p>Celular</p>
                <div class="exibir"><?php echo($rsRetorno['celular']) ?></div>
            </div>
             <div class="teste">
                <p>Email</p>
                <div class="exibir"><?php echo($rsRetorno['email']) ?></div>
            </div>
             <div class="teste">
                <p>Home Page</p>
                <div class="exibir"><?php echo($rsRetorno['homepage']) ?></div>
            </div>
             <div class="teste">
                <p>Link</p>
                <div class="exibir"><?php echo($rsRetorno['link']) ?></div>
            </div>
             <div class="teste">
                <p>Sugestão</p>
                <div class="exibir"><?php echo($rsRetorno['sugestao']) ?></div>
            </div>
             <div class="teste">
                <p>Informação</p>
                <div class="exibir"><?php echo($rsRetorno['informacao']) ?></div>
            </div>
             <div class="teste">
                <p>Sexo</p>
                <div class="exibir">
                    <input type="radio" name="rdosexo" <?php echo($chkfeminino) ?> value="F">Feminino
                    <input type="radio" name="rdosexo" <?php echo($chkmasculino) ?> value="M">Masculino
                 </div>
            </div>
             <div class="teste">
                <p>Profissão</p>
                <div class="exibir"><?php echo($rsRetorno['profissao']) ?></div>
            </div>
        </div>
    </body>
</html>