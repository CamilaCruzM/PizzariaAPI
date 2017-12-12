<?php
    $con = mysqli_connect("localhost", "root", "bcd127", "dbcontatosapi");

    $sql = "select * from tbl_contato";

    $result = mysqli_query($con, $sql);
    
    $lstContatos = array();

    if(mysqli_num_rows($result) > 0){
        while($contato = mysqli_fetch_assoc($result)){
            $lstContatos[] = $contato;
        }
    }

    echo json_encode($lstContatos);
?>