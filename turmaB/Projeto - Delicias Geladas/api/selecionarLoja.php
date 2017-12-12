<?php 

/*conexao com o Banco de Dados*/
    
    //Estabelece uma conexao com o BD MySQl
$conexao=mysqli_connect('localhost','root','bcd127','dbdeliciasgeladas');

$sql="select * from tbl_loja;";

$resultado = mysqli_query ($conexao,$sql);

$lstLojas = array();

    while ($loja = mysqli_fetch_assoc($resultado)){
       $lstLojas[]= $loja;
    }    
echo json_encode($lstLojas);
?>