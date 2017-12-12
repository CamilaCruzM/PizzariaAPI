<?php 
$produto=null;
$estrela= null;
/*conexao com o Banco de Dados*/
    
    //Estabelece uma conexao com o BD MySQl
$conexao=mysqli_connect('localhost','root','bcd127','dbpizzariafrajolas');

$sql="insert into tbl_avaliacao(idProduto, avaliacao) values
('".$produto."','".$estrela."');";


$resultado = mysqli_query ($conexao,$sql);

$lsAvaliacao = array();

    while ($contato = mysqli_fetch_assoc($resultado)){
        $lsAvaliacao[]= $contato;
        //$lstContatos[]= array("usuario"=>$contato["nome"], "tel"=>$contato["telefone"]);
    }    
echo json_encode($lsAvaliacao);
?>