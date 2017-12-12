<?php
require_once('modulo.php');

Conexao_Banco();

if(isset($_POST['btnsalvar']))
{
    $titulo=$_POST['txtnivel'];
    $descricao=$_POST['txtdesc'];
    
    $sql="insert into tbl_categoria(nomeCategoria,descricao) values ('".$titulo."','".$descricao."');";
    
    mysql_query($sql);
    //echo($sql);
    
}
?>


<html>
    <head>
        <title>Cadastro de Categoria</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_nivel.css">
    </head>
    <body>
        <header>
            <div id="titulo">
                <b> CMS</b>-Sistema de Gerenciamento de Site
            </div>
            <div id="logo">
                <img src="imagem/loginho.png" alt="logo">
            </div> 
        </header>
        <div id="conteudo">
            <div id="photos">
                <figure>
                    <img src="Imagens/content.png" width="90" height="90" alt="ggfh">
                </figure>
                <figure>
                    <img src="Imagens/smartphone.png" width="90" height="90" alt="vdf">
                </figure>
                <figure>
                    <img src="imagem/produto.png" width="90" height="90" alt="bb">
                </figure>
                <figure>
                    <img src="Imagens/Livro.png" width="90" height="90" alt="bgf">
                </figure>
            </div>
            <div id="menus">
                <div class="titulo_menu">
                    <a href="cms.php" class="link">
                         Adm.
                        Conteúdo
                    </a>
                </div>
                <div class="titulo_menu">
                   <a href="faleconosco.php">
                        Adm.
                    Fale Conosco
                   </a>
                </div>
                <div class="titulo_menu">
                    <a href="produt.php" class="link">
                        Adm.
                    Produtos
                    </a>
                </div>
                <div class="titulo_menu">
                   <a href="user.php">
                        Adm.
                        Usuários
                    </a>
                </div>
            </div>
            <form name="frmnivel" method="post" action="categoria.php">
            <table border="1" width="30" height="200" align="center">
                <tr>
                    <td>Titulo</td>
                    <td><input name="txtnivel" value="" type="text" maxlength="60" size="60"></td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td><input type="text" name="txtdesc" value="" maxlength="60" size="60"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btnsalvar" value="Salvar">
                   
                    </td>
                </tr>
                
            </table>
            </form>
        </div>
        <footer>
        </footer>
    </body>
</html>