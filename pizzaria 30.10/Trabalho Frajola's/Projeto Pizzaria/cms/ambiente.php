<?php

//conexao do banco
require_once('modulo.php');

Conexao_Banco();
session_start();
$endereco=null;
$bairro=null;
$numero=null;
$telefone=null;
$estado=null;
$cidade=null;
$diretorio_completo=null;
$MovUpload=false;
$imagem_file=null;





$botao="Salvar";

//botão salvar
if(isset($_POST['btnSalvar']))
{
    $endereco=$_POST['txtend'];
    $bairro=$_POST['txtbairro'];
    $numero=$_POST['txtnumero'];
    $telefone=$_POST['txttelefone'];
    $estado=$_POST[ 'slcestado'];
    $cidade=$_POST['txtcidade'];
    $operacao=$_POST['btnSalvar'];

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
        
        $sql="insert into tbl_ambiente (imagem,endereco,bairro,numero,idEstado,cidade,telefone)
        values ('".$diretorio_completo."','".$endereco."','".$bairro."','".$numero."','".$estado."','".$cidade."','".$telefone."');";
        
        
        mysql_query($sql);


        header('location:ambiente.php');
//                "Arquivo movido com sucesso"
       // echo($sql);
        
        
        //UPDATE
        
    }else if ($operacao == "Editar"){
           if ($imagem_file == true && $MovUpload==true) {     
               $sql="update tbl_ambiente set  imagem='".$diretorio_completo."',endereco='".$endereco."',bairro='".$bairro."',numero='".$numero."',idEstado='".$estado."',cidade='".$cidade."',telefone='".$telefone."' where idAmbiente=".$_SESSION['id'];
                    
               

           }else{
               $sql="update tbl_ambiente set  endereco='".$endereco."',bairro='".$bairro."',numero='".$numero."',idEstado='".$estado."',cidade='".$cidade."',telefone='".$telefone."' where idAmbiente=".$_SESSION['id'];
                   
             
           }
                
            mysql_query($sql);
       
                header('location:ambiente.php');


        }// fim do update
        
            
    }
    

if(isset($_GET['modo']))
{
    $modo=$_GET['modo'];
    //echo($modo);
    
    if($modo=='excluir')
    {
        $idAmbiente=$_GET['id'];        
        $sql = "delete from tbl_ambiente where idAmbiente=".$idAmbiente;
         mysql_query($sql);
            //echo($sql);
        header("location:ambiente.php");
        
        
        
    }else if($modo=='editar')//MODO EDITAR
    {
            $_SESSION['id']= $_GET['id'];
        
        $sql = "select a.* , e .* from tbl_ambiente as a , tblestado as e where a.idEstado=e.idEstado and  idAmbiente=".$_SESSION['id'];
        
       
            echo $sql;
        
          $select = mysql_query($sql);
        
         if($rs=mysql_fetch_array($select)){
             
         
            $endereco=$rs['endereco'];
            $bairro=$rs['bairro'];
            $numero=$rs['numero'];
            $telefone=$rs['telefone'];
//            $estado=$rs[ 'idEstado '];
            $cidade=$rs['cidade'];
            $diretorio_completo=$rs['imagem'];

            $botao='Editar';
             
  
       } 
      
    
    
  
     
    }   
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adm.Fale Conosco</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style_ambiente.css">
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
            <form name="frambiente" method="post" action="ambiente.php" enctype="multipart/form-data">
               
            <table border="1" width=400 height=150 align="center" id="mainambiente">
                    <tr>
                        <td>Imagem</td>
                        <td><input value="" type="file" name="fleimagem"></td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td><input type="text" value="<?php echo($endereco) ?>" name="txtend" maxlength="60" size="60px" required></td>
                    </tr>
                    <tr>
                        <td>Bairro</td>
                        <td><input type="text" value="<?php echo($bairro) ?>" name="txtbairro" maxlength="60" size="60px"></td>
                    </tr>
                    <tr>
                        <td>Número</td>
                        <td><input type="text" value="<?php echo($numero) ?>" name="txtnumero" maxlength="6" size="6" placeholder="apenas numero"></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" value="<?php echo($telefone) ?>" maxlength="12" size="12" name="txttelefone"></td>
                    </tr>
                    <tr>
                        <td>
                       Estado 
                        <select class="dados_combo" name="slcestado">

                          <?php
                          $sql='select * from tblestado;';
                          echo $sql;

                          $select = mysql_query($sql);

                          while($rs = mysql_fetch_array($select)){
                           ?>
                           <option value='<?php echo $rs['idEstado'] ?>'> <?php echo $rs['sigla'] ?></option>

                           <?php
                            }
                            ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Cidade</td>
                        <td><input type="text" value="<?php echo($cidade) ?>" maxlength="30" size="30" name="txtcidade"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="btnSalvar" value="<?php echo($botao) ?>"></td>
                    </tr>
                </table>
                <table border="1" width="900" height="100" aling="center" id="consult">
                    <tr>
                        <td align="center" id="consulta" colspan="6">Controle de Ambiente</td>
                    </tr>
                    <tr>
                        <td>Imagem:</td>
                        <td>Endereço:</td>
                        <td>Bairro:</td>
                        <td>Número:</td>
                        <td>Estado:</td>
                        <td>Cidade:</td>
                        <td>Telefone:</td>
                        <td>Opções:</td>
                    </tr>
                    
                         <?php
                        $sql="select a.* ,e.* from tbl_ambiente as a ,tblestado as e where a.idEstado=e.idEstado order by idAmbiente desc";
                        $select=mysql_query($sql);
                   $cont=0;
                   while ($rs=mysql_fetch_array($select)) {
                     if ($cont%2==0) {
                       $cor='cor1';
                     }else {
                       $cor='cor2';

                     }
                    {
                        
                    
                    
                    ?>
                    
                  
                    <tr class="<?php echo $cor ?>">
                        <td><img src="<?php echo($rs['imagem']) ?>" width="100" height="100"></td>               
                        <td><?php echo($rs['endereco']) ?></td>
                        <td><?php echo($rs['bairro']) ?></td>
                        <td><?php echo($rs['numero']) ?></td>
                        <td><?php echo($rs['estado']) ?></td>
                        <td><?php echo($rs['cidade']) ?></td>
                        <td><?php echo($rs['telefone']) ?></td>
                        
                        <td>
                            <a href="ambiente.php?modo=excluir&id=<?php echo($rs['idAmbiente']) ?>">
                                <img src="Icon/delete_16.png">
                            </a>
                            
                            <a href="ambiente.php?modo=editar&id=<?php echo($rs['idAmbiente']) ?>">
                                <img src="Icon/edit_16.png">
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                   }
                    ?>
                </table>
            </form>
        </div>
    <footer>
    </footer>
    </body>
</html>