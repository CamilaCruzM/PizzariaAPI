<?php
//Conexao utilizada no banco
require_once('modulo.php');

Conexao_Banco();

session_start();
$nome= null;
 $preco=null;
 $descricao=null;
$botao ="Salvar";
$diretorio_completo=null;
$MovUpload=false;
$imagem_file=null;

if(isset($_POST['btnsalvar']))
{
    $nome=$_POST['txtnome'];
    $preco=$_POST['nmbpreco'];
    $descricao=$_POST['txtdesc'];
    $ingrediente=$_POST['txtingrediente'];
    $informacao=$_POST['txtinfo'];
    $operacao=$_POST['btnsalvar'];
echo("shazam");
    
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
        
        $sql="insert into tbl_produtos (nome,preco,imagem,descricao,ingrediente,informacaoNutricional)
        values ('".$nome."','".$preco."','".$diretorio_completo."','".$descricao."','".$ingrediente."', '".$informacao."');";

        //mysql_query($sql);
    
        
        
        echo($sql);


        header('location:produtos.php');
//                "Arquivo movido com sucesso"
      //  echo($sql);
            
    }else if ($operacao == "Editar"){
           if ($imagem_file == true && $MovUpload==true) {     
               $sql="update tbl_produtos set  nome='".$nome."',preco='".$preco."',imagem='".$diretorio_completo."','".$descricao."', ingrediente='".$ingrediente."' informacao='".$informcao."' where idProduto=".$_SESSION['id'];
                    
               

           }else{
               $sql="update tbl_produtos set  nome='".$nome."',preco='".$preco."','".$descricao."' where idProduto=".$_SESSION['id'];
                   
             
           }
                
            mysql_query($sql);
       
                header('location:produtos.php');


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
        $sql = "delete from tbl_produtos where idProduto=". $_SESSION['id'];
         mysql_query($sql);
        
        //echo($sql);
       // header("location:produtos.php");
        
    }else if($modo=='editar')//MODO EDITAR
    {
            $_SESSION['id']= $_GET['id'];

        
         //selecionar todos os campos do banco
        $sql = "select * from tbl_produtos where idProduto=".$_SESSION['id'];

        
          $select = mysql_query($sql);
        
          if($rs=mysql_fetch_array($select))
         {
             
         
             $nome=$rs['nome'];
             $diretorio_completo=$rs['imagem'];
             $descricao=$rs['descricao'];
             $botao="Editar";
             $preco=['preco'];
             
  
         }
         }
}


?>
<html>
    <head>
        <title>
            Produtos
        </title>
        <link rel="stylesheet" type="text/css" href="css/style_produtos.css">
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
            <form name="frmprodutos" method="POST" action="produtos.php" enctype="multipart/form-data">
            <table border="1" width="200" height="200" align="center" id="mainprodutos" style="margin-top:15px;">
                <tr>
                    <td>Nome</td>
                    <td><input value="" type="txt" name="txtnome" maxlength="60" size="60px" required></td>
                </tr>
                <tr>
                    <td>Preço</td>
                    <td><input value="" type="txt" maxlength="30" size="10px" name="nmbpreco" placeholder="R$"></td>
                </tr>
                <tr>
                    <td>Imagem</td>
                    <td><input type="file" name="fleimagem"></td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td><input type="text" value="" name="txtdesc" maxlength="60" size="60px"></td>
                </tr>
                <tr>
                    <td>Ingredientes</td>
                    <td><input type="text" value="" name="txtingrediente" maxlength="60" size="60px"></td>
                </tr>
                <tr>
                    <td>Informações Nutricional</td>
                    <td><input type="text" value="" name="txtinfo" maxlength="60" size="60px"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btnsalvar" value="<?php echo($botao) ?>">
                    </td>
                </tr>
            </table>
            <table border="1" width="900" height="100" aling="center" id="consult">
                 <tr>
                    <td align="center" id="consulta" colspan="6" >Controle de Produtos</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>Preço:</td>
                    <td>Imagem:</td>
                    <td>Descrição:</td>
                    <td>Ingredientes:</td>
                    <td>Informações Nutricional:</td>
                </tr>
                 <?php
                    $sql="select * from tbl_produtos order by idProduto desc";
                    $select= mysql_query($sql);
                    while($rs=mysql_fetch_array($select))
                    {
                        
                   
                    
                   ?>
                <tr>
                    <td><?php echo($rs['nome']) ?></td>
                    <td><?php echo($rs['preco']) ?></td>
                    <td><img src="<?php echo($rs['imagem']) ?>" width="100" height="100"></td>             
                    <td><?php echo($rs['descricao']) ?></td>
                    <td><?php echo($rs['ingredientes']) ?></td>
                    <td><?php echo($rs['informacao Nutricional']) ?></td>
                    <td>
                        <a href="produtos.php?modo=excluir&id=<?php echo($rs['idProduto']) ?>">
                            <img src="Icon/delete_16.png">
                        </a>
                            
                        <a href="produtos.php?modo=editar&id=<?php echo($rs['idProduto']) ?>">
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