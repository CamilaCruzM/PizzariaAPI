<?php
//Estabelece uma conexao com o BD MySQl
$conexao=mysqli_connect('localhost','root','bcd127','dbpizzariafrajolas');

$sql="select telefone from tbl_ambiente where idAmbiente = 1;";


$resultado = mysqli_query ($conexao,$sql);

$lstContatos = array();

    while ($contato = mysqli_fetch_assoc($resultado)){
        $lstContatos[]= $contato;
        //$lstContatos[]= array("usuario"=>$contato["nome"], "tel"=>$contato["telefone"]);
    }    
echo json_encode($lstContatos);
?>