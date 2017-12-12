<?php

//Conexao utilizada no banco
require_once('modulo.php');

Conexao_Banco();
session_start();


$botao ="Salvar";
 $titulo=null;
$conteudo=null;
$diretorio_completo=null;
$MovUpload=false;
$imagem_file=null;
    


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
        
        $sql="insert into tbl_promocao(titulo,imagem,conteudo)
        values ('".$titulo."','".$diretorio_completo."','".$conteudo."');";

        mysql_query($sql);


        header('location:promocoes.php');
//                "Arquivo movido com sucesso"
      //  echo($sql);
   
   //UPDATE
        
    }else if ($operacao == "Editar"){
           if ($imagem_file == true && $MovUpload==true) {     
               $sql="update tbl_promocao set  titulo='".$titulo."',imagem='".$diretorio_completo."',conteudo='".$conteudo."' where idPromocao=".$_SESSION['id'];
                    
               

           }else{
               $sql="update tbl_promocao set  titulo='".$titulo."',conteudo='".$conteudo."' where idPromocao=".$_SESSION['id'];
                   
             
           }
                
            mysql_query($sql);
       
                header('location:promocoes.php');


        }// fim do update
        
            
    
            
    }
    
   
    

//Modo excluir

  if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
        $_SESSION['id']=$_GET['id'];    
        $sql = "delete from tbl_promocao where idPromocao=".$_SESSION['id'];
         mysql_query($sql);
            //echo($sql);
        //header("location:promocoes.php");
        
    }else if($modo=='editar')//MODO EDITAR
        {
            
        
        $_SESSION['id']= $_GET['id'];

        
         //selecionar todos os campos do banco
        $sql = "SELECT * FROM tbl_promocao where idPromocao=".$_SESSION['id'];
           // echo $sql;
        
          $select = mysql_query($sql);
        
          if($rs=mysql_fetch_array($select))
         {
             
         
             $titulo=$rs['titulo'];
             $diretorio_completo=$rs['imagem'];
             $conteudo=$rs['conteudo'];
             $botao="Editar";
           
             
  
       } 
        }
    
}
            
?>
<html>
    <head>
        <title>Promoções</title>
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
            <form name="fmlpromocao" method="post" action="promocoes.php" enctype="multipart/form-data">
            <table border="1" width="300" height="300" align="center" id="mainpromocao">
                <tr>
                    <td>Titulo</td>
                    <td><input value="<?php echo($titulo)?>" type="text" name="txttitulo" maxlength="60" size="60px" required></td>
                </tr>
                <tr>
                    <td>Imagem</td>
                    <td><input type="file" name="fleimagem">
                    </td>
                </tr>
                <tr>
                    <td>Conteúdo</td>
                    <td>
                    <textarea  name="txtconteudo" cols="50" rows="4"><?php echo($conteudo)?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type=submit name="btnsalvar" value="<?php echo($botao)?>"></td>
                </tr>
            </table>
            <table border="1" width="600" height="100" align="center" id="consulta">
                <tr>
                    <td align="center" id="consult" colspan="6"> 
                        Controle de Promoções
                    </td>
                </tr>
                <tr>
                    <td>Titulo:</td>
                    <td>Imagem:</td>
                    <td>Conteudo:</td>
                    <td>Opções:</td> 
                </tr>
                <?php
                 $sql="select * from tbl_promocao order by idPromocao desc";
                 $select=mysql_query($sql);
                //echo($select);
                while($rs=mysql_fetch_array($select))
                {
            
                    
                    
                ?>
                <tr>
                    <td><?php echo($rs['titulo'] )?></td>
                    <td><img src="<?php echo($rs['imagem']) ?>" width="100" height="100"></td>
                    <td><?php echo($rs['conteudo']) ?></td>
                    <td>
                        <a href="promocoes.php?modo=excluir&id=<?php echo($rs['idPromocao']) ?>">
                         <img src="Icon/delete_16.png">
                        </a>
                            
                        <a href="promocoes.php?modo=editar&id=<?php echo($rs['idPromocao']) ?>">
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