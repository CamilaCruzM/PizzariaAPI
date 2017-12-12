<?php
//conexao do banco
require_once('modulo.php');

Conexao_Banco();
session_start();
$nome=null;
$telefone=null;
$email=null;
$sexo=null;
$usuario=null;
$senha=null;
 $nivel=null;

$botao="Salvar";
if(isset($_POST['btnSalvar']))
{
    

    $nome=$_POST['txtnome'];
    $telefone=$_POST['txttel'];
    $email=$_POST['txtemail'];
    $sexo=$_POST['rdosexo'];
    $usuario=$_POST['txtusuario'];
    $senha=$_POST['txtsenha'];
    $nivel=$_POST['txtnivel'];
    $operacao=$_POST['btnSalvar'];
    
   if($operacao == "Salvar"){
        
        $sql="insert into tbl_usuario (nome,telefone,email,sexo,usuario,senha,nivel)
    values ('".$nome."','".$telefone."','".$email."','".$sexo."','".$usuario."','".$senha."','".$nivel."');";
        
        
        mysql_query($sql);


        header('location:usuario.php');
//                "Arquivo movido com sucesso"
       // echo($sql);
        
        
        //UPDATE
        
    }else if ($operacao == "Editar"){
       
       $sql="update tbl_usuario set  nome='".$nome."',telefone='".$telefone."',email='".$email."',sexo='".$sexo."',usuario='".$usuario."',senha='".$senha."',nivel='".$nivel."' where idUsuario=".$_SESSION['id'];
                   

           }
               
              mysql_query($sql);
                echo($sql);
            header('location:usuario.php');
           }
  


if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
        $idUsuario=$_GET['id'];        
        $sql = "delete from tbl_usuario where idUsuario=".$idUsuario;
         mysql_query($sql);
            //echo($sql);
        header("location:usuario.php");
        
        
        
        }else if($modo=='editar')//MODO EDITAR
        {
       

         $_SESSION['id']= $_GET['id'];
        
        $sql = "select u.* ,n.* from tbl_usuario as u , tbl_nivel_usuario as n where u.nivel=n.idNivel and idUsuario=".$_SESSION['id'];
            
            echo $sql;
        
          $select = mysql_query($sql);
        
         if($rs=mysql_fetch_array($select)){
             
             $nome=$rs['nome'];
            $telefone=$rs['telefone'];
            $email=$rs['email'];
            $sexo=$rs['sexo'];
            $usuario=$rs['usuario'];
            $senha=$rs['senha'];
            $nivel=$rs['nivel'];
            
             $botao="Editar"; 

         }
       } 
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Adm.Usuario</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_usuario.css">
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
            <form name="frluser" method="post" action="usuario.php"
            enctype="multipart/form-data">
            <table border="1" width=400 height=150 align="center" id="mainambiente">
                <tr>
                    <td>Nome</td>
                    <td><input name="txtnome" value="<?php echo ($nome)?>" maxlength="60" size="60"></td>
                </tr>
                <tr>
                    <td>Telefone</td>
                    <td><input type="text" value="<?php echo ($telefone)?>" name="txttel" maxlength="60" size="60px" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" value="<?php echo ($email)?>" name="txtemail" maxlength="60" size="60px"></td>
                </tr>
                    <tr>
                        <td>Sexo</td>
                        <td><input type="radio" name="rdosexo" value="F" required checked>Feminino
                        <input type="radio" name="rdosexo" value="M">Masculino</td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="text" value="<?php echo ($usuario)?>" maxlength="12" size="12" name="txtusuario"></td>
                    </tr>
                    <tr>
                        <td>Senha</td>
                        <td><input type="text" value="<?php echo ($senha)?>" maxlength="6" size="6" name="txtsenha"></td>
                    </tr>
                    <tr>
                        <td>Nivel</td>
                        <td>
                            <select name="txtnivel">
                            <?php
                                $sql = "select * from tbl_nivel_usuario";
                                $select = mysql_query($sql);
                                while($rsNivel=mysql_fetch_array($select)){
                                ?>
                                    
                                        <option value="<?php  echo($rsNivel['idNivel']) ?>"><?php echo($rsNivel['titulo']) ?></option>
                                    
                                <?php 
                                }
                                ?>
                           </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btnSalvar" value="<?php echo ($botao)?>"></td>
                    </tr>
            </table>
            <table border="1" width="900" height="100" aling="center" id="consult">
                <tr>
                        <td align="center" id="consulta" colspan="6">Consulta de Usuário</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>Telefone:</td>
                        <td>Email:</td>
                        <td>Sexo:</td>
                        <td>Usuario:</td>
                        <td>Nivel:</td>
                        <td>Opções:</td>
                    </tr>
                  <?php
                        $sql="select * from tbl_usuario order by idUsuario desc";
                        $select= mysql_query($sql);
                    while($rs=mysql_fetch_array($select))
                    {
                        
                    
                    ?>
                    <tr>
                        <td><?php echo($rs['nome']) ?></td>
                        <td><?php echo($rs['telefone']) ?></td>
                        <td><?php echo($rs['email']) ?></td>
                        <td><?php echo($rs['sexo']) ?></td>
                        <td><?php echo($rs['usuario']) ?></td>
                        <td><?php echo($rs['nivel']) ?></td>
                        
                        <td>
                            <a href="usuario.php?modo=excluir&id=<?php echo($rs['idUsuario']) ?>">
                                <img src="Icon/delete_16.png">
                            </a>
                            
                            <a href="usuario.php?modo=editar&id=<?php echo($rs['idUsuario']) ?>">
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