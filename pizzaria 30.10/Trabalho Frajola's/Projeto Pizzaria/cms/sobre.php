<?php
require_once('modulo.php');

Conexao_Banco();

if(isset($_POST['btnSalvar']))
{
    $titulo=$_POST['txttitulo'];
    $conteudo=$_POST['txtconteudo'];
   
    
    $sql="insert into tbl_sobre (titulo,conteudo)
     values ('".$titulo."','".$conteudo."');";
                
    mysql_query($sql);
     //echo $sql;           
                
   header('location:sobre.php');        
        
            
}
    
if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
        $idSobre=$_GET['id'];        
        $sql = "delete from tbl_sobre where idSobre=".$idSobre;
         mysql_query($sql);
            //echo($sql);
        header("location:sobre.php");
        
    }else if($modo=='editar')//MODO EDITAR
    {
        $botao="Editar";
        

         $_SESSION['id']= $idSobre;
        
        $sql = "select tbl_sobre.titulo as titulo, tbl_sobre.conteudo  from tbl_sobre inner join tbl_sobre on tbl_sobre.idSobre = tbl_sobre.idSobre where tbl_sobre.idSobre=".idSobre;

        
          $select = mysql_query($sql);
        
         if($rs=mysql_fetch_array($select)){
             
         
           $titulo=$_POST['txttitulo'];
           $conteudo=$_POST['txtconteudo'];
            
       } 
      
    
    
    }   
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adm.Fale Conosco</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_sobre.css">
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
                   <a href="sobre.php" class="link">
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
             <form name="frmsobre" method="post" action="sobre.php" enctype="multipart/form-data">
                <table border="1" width=400 height=150 align="center" id="mainsobre">
                    <tr>
                        <td>Titulo</td>
                        <td><input value="" type="txt" name="txttitulo"></td>
                    </tr>
                    <tr>
                        <td>Conteudo</td>
                        <td><textarea name="txtconteudo"></textarea></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btnSalvar" value="Salvar"></td>
                    </tr>
                </table>
                <table border="1" width="900" height="100" aling="center" id="consult">
                    <tr>
                        <td align="center" id="consulta" colspan="6">Sobre a Pizzaria</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>Conteudo:</td>
                        <td>Opções:</td>
                    </tr>
                    <?php
                        $sql="select * from tbl_sobre order by idSobre desc";
                        $select= mysql_query($sql);
                    while($rs=mysql_fetch_array($select))
                    {
                        
                    
                    ?>
                    <tr>
                         <td><?php echo($rs['titulo']) ?></td>
                        <td><?php echo($rs['conteudo']) ?></td>
                        <td>
                            <a href="sobre.php?modo=excluir&id=<?php echo($rs['idSobre']) ?>">
                                <img src="Icon/delete_16.png">
                            </a>
                            
                            <a href="sobre.php?modo=editar&id=<?php echo($rs['idSobre']) ?>">
                                <img src="Icon/edit_16.png">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </form>
        </div>
        <footer>
        </footer>
        </body>
    </html>