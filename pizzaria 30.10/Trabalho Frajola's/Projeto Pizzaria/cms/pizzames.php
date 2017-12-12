<?php 

//conexao com o banco
require_once('modulo.php');

Conexao_Banco();

session_start();
$titulo=null;
$texto=null;
$botao = "Salvar";
$diretorio_completo=null;
$MovUpload=false;
$imagem_file=null;

if(isset($_POST["btnsalvar"]))
{   
    $titulo=$_POST['txttitulo'];
    $texto=$_POST['txttexto'];
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
        
        $sql="insert into tbl_pizzames (titulo,imagem,texto)
        values ('".$titulo."','".$diretorio_completo."','".$texto."');";

        mysql_query($sql);


        header('location:pizzames.php');
//                "Arquivo movido com sucesso"
        //echo($sql);
       
     //UPDATE
        
    }else if ($operacao == "Editar"){
           if ($imagem_file == true && $MovUpload==true) {     
               $sql="update tbl_pizzames set  titulo='".$titulo."',imagem='".$diretorio_completo."',conteudo='".$conteudo."' where idPizzaMes=".$_SESSION['id'];
                    


           }else{
               $sql="update tbl_
               pizzames set  titulo='".$titulo."',conteudo='".$conteudo."' where idPizzaMes=".$_SESSION['id'];
                   
             
           }
                
            mysql_query($sql);
       
                header('location:pizzames.php');


        }// fim do update
        
    
}
if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
        $idPizzaMes=$_GET['id'];        
        $sql = "delete from tbl_pizzames where idPizzaMes=".$_SESSION['id'];
         mysql_query($sql);
            //echo($sql);
       // header("location:pizzames.php");
        
    }else if($modo=='editar')//MODO EDITAR
        {
            $botao = "Editar";
       
         $_SESSION['id']= $_GET['id'];
        
         $sql = "SELECT * FROM tbl_pizzames where idPizzaMes=".$_SESSION['id'];

        
          $select = mysql_query($sql);
        
         if($rs=mysql_fetch_array($select)){
             
             $titulo=$rs['titulo'];
             $texto=$rs['texto'];
             $diretorio_completo=$rs['imagem'];
            

             
       } 
      
    
    
  
        }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pizza do Mes</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_pizzames.css">
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
                   <a href="produtos.php">
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
            <form name="flmpizza" method="post" action="pizzames.php" enctype="multipart/form-data">
                 <table border="1" width=400 height=150 align="center" id="maes">
                  <tr>
                        <td>Titulo</td>
                        <td><input value="<?php echo($titulo)?>" type="txt" name="txttitulo"></td>
                    </tr>
                    <tr>
                        <td>Imagem</td>
                        <td><input type="file" name="fleimagem"></td>
                    </tr>
                    <tr>
                        <td>Conteudo</td>
                        <td><input value="<?php echo($texto)?>" type="text" name="txttexto"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="btnsalvar" value="<?php echo($botao) ?>">
                        </td>
                    </tr>
            </table>
            <table border="1" width="600" height="100" align="center" id="consulta">
                    <tr>
                        <td align="center" id="consult" colspan="6"> Controle Pizza do Mês</td>
                    </tr>
                    <tr>
                        <td>Titulo:</td>
                        <td>Imagem:</td>
                        <td>Conteudo:</td>
                        <td>Opções:</td>
                        
                    </tr>
                    <?php
                        $sql="select * from tbl_pizzames order by idPizzaMes desc";
                        $select=mysql_query($sql);
                    while($rs=mysql_fetch_array($select))
                    {
                        
                    
                    
                    ?>
                    <tr>
                        <td><?php echo($rs['titulo'] )?></td>
                        <td><img src="<?php echo($rs['imagem']) ?>" width="100" height="100"></td>
                        <td><?php echo($rs['texto']) ?></td>
                        
                        <td>
                            <a href="pizzames.php?modo=excluir&id=<?php echo($rs['idPizzaMes']) ?>">
                                <img src="Icon/delete_16.png">
                            </a>
                            
                            <a href="pizzames.php?modo=editar&id=<?php echo($rs['idPizzaMes']) ?>">
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