<?php 

/*conexao com o Banco de Dados*/
    
    //Estabelece uma conexao com o BD MySQl
$conexao=mysqli_connect('localhost','root','bcd127','dbAPI');

$sql="select * from contato;";

$resultado = mysqli_query ($conexao,$sql);

$lstContatos = array();

    while ($contato = mysqli_fetch_assoc($resultado)){
        $lstContatos[]= $contato;
        //$lstContatos[]= array("usuario"=>$contato["nome"], "tel"=>$contato["telefone"]);
    }    
echo json_encode($lstContatos);
?>