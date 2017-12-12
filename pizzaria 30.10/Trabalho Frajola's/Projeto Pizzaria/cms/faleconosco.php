<?php
session_start();
$nome=null;
$telefone=null;
$celular=null;
$email=null;
$homepage=null;
$link=null;
$sugestao=null;
$informacao=null;
$sexo = null;
$profissao = null;
$visualizar="Ver";

//Ativa o database a ser utilizado no programa
require_once('modulo.php');

Conexao_Banco();

//Modo de excluir um dado
if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    

    if($modo=='excluir')
    {
        $id=$_GET['id'];

        //comando sql que deleta o conteudo do banco
        $sql =  "delete from tblfaleconosco where id=".$id;
        mysql_query($sql);

        //echo($sql);
        
        //Visualização de todos os campos do fale conosco
    }else if($modo=='controle_visualizar')
        
        $visualizar="Ver";
    
        $id=$_GET['id'];
    
         $_SESSION['id']= $id;
    
        $sql="select * from tblfaleconosco where id=".$id;
    
        $select=mysql_query($sql);
        //echo($sql);
    
      if($rsControle = mysql_fetch_array($select))
        {
        //Resgata os dados do BD e guarda em variavel local
            $nome=$rsControle['nome'];
            $telefone=$rsControle['telefone'];
            $celular=$rsControle['celular'];
            $email=$rsControle['email'];
            $homepage=$rsControle['homepage'];
            $link=$rsControle['link'];
            $sugestao=$rsControle['sugestao'];
            $informacao=$rsControle['informacao'];
            $sexo=$rsControle['sexo'];
            $profissao=$rsControle['profissao'];
            
            
          // Modo de edição de conteudo  
        }
     
    }   
    


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adm.Fale Conosco</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/stylefaleconosco.css">
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
                   <a href="produtos.php" class="link">
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
            <table border="1" width="1000" height="90" align="center" id="controle">
                <tr>
                    <td align="center" id="consulta" colspan="6">
                        Controle Fale Conosco
                    </td>
                </tr>
                <tr align="center">
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>Celular</td>
                    <td>Sexo</td>
                    <td>Profissão</td>
                    <td>Opções</td>
                </tr>
                <?php
                    $sql="select * from tblfaleconosco order by id desc";
                    $select =mysql_query($sql);

                    while($rsControle = mysql_fetch_array($select))
                        {
                            
                       
                    ?>
                    <tr>
                        <td><?php echo($rsControle['nome']) ?></td>
                        <td><?php echo($rsControle['telefone']) ?></td>
                        <td><?php echo($rsControle['celular']) ?></td>
                        <td><?php echo($rsControle['sexo']) ?></td>
                        <td><?php echo($rsControle['profissao']) ?></td>
                        <td>
                            <a href="faleconosco.php? modo=excluir&id=<?php echo($rsControle['id']) ?>">
                            <img src="Icon/delete_16.png"> 
                            </a>
                            
                            
                           <a href="visualizar.php? modo=controle_visualizar&id=<?php echo
                            ($rsControle['id']) ?>" >
                               <img src="Icon/OLHO.png"> 
                            </a>
                            
                        </td>
                    </tr>
                <?php
                        }
                ?>
            </table>
        </div>
        <footer>
        </footer>
    </body>
</html>