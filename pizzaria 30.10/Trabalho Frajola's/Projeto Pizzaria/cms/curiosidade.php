<?php
//$rsConsult=null;
//Conexao utilizada no banco
require_once('modulo.php');

Conexao_Banco();

session_start();
$tituloA = null;
$conteudoA = null;
$diretorio_completo=null;
$MovUpload=false;
$imagem_file=null;
$botao ="Salvar";



//Botão salvar
if(isset($_POST['btnsalvar']))
{
    $titulo=$_POST['txttitulo'];
    $conteudo=$_POST['txtconteudo'];
    $operacao=$_POST['btnsalvar'];
    
     // pegando a imagem da funcao
    //checando se esta vazio
if (!empty($_FILES['fleimagem']['name'])) {

      $imagem_file = true;
      $diretorio_completo=salvarFoto($_FILES['fleimagem']);

      if ($diretorio_completo == "Erro") {

          echo "<script>
              alert('arquivo nao movido');
              window.history.go(-1);

              </script>";
            $MovUpload=false;
      }else {
        $MovUpload=true;
      }
    }else {
      $imagem_file = false;
    }
     // checando as operacoes 
    //INSERT
    if($operacao == "Salvar"){
        
        $sql="insert into tbl_curiosidade (titulo,imagem,conteudo)
        values ('".$titulo."','".$diretorio_completo."','".$conteudo."');";

        mysql_query($sql);


        header('location:curiosidade.php');
//                "Arquivo movido com sucesso"
      //  echo($sql);
       
          //UPDATE
        
    }else if ($operacao == "Editar"){
           if ($imagem_file == true && $MovUpload==true) {     
               $sql="update tbl_curiosidade set  titulo='".$titulo."',imagem='".$diretorio_completo."',conteudo='".$conteudo."' where idCuriosidade=".$_SESSION['id'];
                    
               

           }else{
               $sql="update tbl_curiosidade set  titulo='".$titulo."',conteudo='".$conteudo."' where idCuriosidade=".$_SESSION['id'];
                   
             
           }
                
            mysql_query($sql);
       
                header('location:curiosidade.php');


        }// fim do update
        
            
    
            
    }
    

//modo excluir

     if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
       $_SESSION['id']=$_GET['id'];        
        $sql = "delete from tbl_curiosidade where idCuriosidade=". $_SESSION['id'];
         mysql_query($sql);
        
        //echo($sql);
       // header("location:curiosidade.php");
         
        
    }else if($modo=='editar')//MODO EDITAR
    {
            $_SESSION['id']= $_GET['id'];

        
         //selecionar todos os campos do banco
        $sql = "SELECT * FROM tbl_curiosidade where idCuriosidade=".$_SESSION['id'];
            //echo $sql;
        
          $select = mysql_query($sql);
        
          if($rs=mysql_fetch_array($select))
         {
             
         
             $tituloA=$rs['titulo'];
             $diretorio_completo=$rs['imagem'];
             $conteudoA=$rs['conteudo'];
             $botao="Editar";
             
  
         }
    } 
}

?>
<html>
    <head>
        <title>
            Curiosidade
        </title>
        <link rel="stylesheet" type="text/css" href="css/style_curiosidade.css">
        <meta charset="utf-8">
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
            <form name="fmlcuriosidade" method="post" action="curiosidade.php" enctype="multipart/form-data">
                <table border="1" width="300" height="300" align="center" id="maincuriosidade">
                    <tr>
                        <td>Titulo</td>
                        <td><input value="<?php echo($tituloA) ?>" type="text" name="txttitulo" maxlength="60" size="60px" required></td>
                    </tr>
                    <tr>
                        <td>Imagem</td>
                        <td><input type="file" name="fleimagem">
                        </td>
                    </tr>
                    <tr>
                        <td>Conteúdo</td>
                        <td>
                            <textarea  name="txtconteudo" cols="50" rows="4"><?php echo($conteudoA) ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type=submit name="btnsalvar" value="Salvar"></td>
                    </tr>
                </table>
                <table border="1" width="600" height="100" align="center" id="consulta">
                    <tr>
                        <td align="center" id="consult" colspan="6"> Controle de Curiosidade</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>Conteudo:</td>
                        <td>Imagem:</td>
                        <td>Opções:</td>
                        
                    </tr>
                    <?php
                        $sql="select * from tbl_curiosidade order by idCuriosidade desc";
                        $select=mysql_query($sql);
                    while($rs=mysql_fetch_array($select))
                    {
                        
                    
                    
                    ?>
                    <tr>
                        <td><?php echo($rs['titulo'] )?></td>
                        <td><?php echo($rs['conteudo']) ?></td>
                        <td><img src="<?php echo($rs['imagem']) ?>" width="100" height="100"></td>
                        <td>
                            <a href="curiosidade.php?modo=excluir&id=<?php echo($rs['idCuriosidade']) ?>">
                                <img src="Icon/delete_16.png">
                            </a>
                            
                            <a href="curiosidade.php?modo=editar&id=<?php echo($rs['idCuriosidade']) ?>">
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