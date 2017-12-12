<?php 

 //******************Conexão com o Mysql *******
    //Estabelece a conexão com o banco de dados mysql
    $conexao= mysql_connect('localhost', 'root', 'bcd127');
    
    //Ativa o database a ser utilizado no programa
    mysql_select_db('dbcontatosinf3');
/******************************************/

//Verifica se o botão salvar foi clicado
if(isset($_GET["btnsalvar"]))
{
    //Resgata os dados fornecidos pelo usuário
    //usando o metodo GET, conforme escolhindo no FORM
    $nome=$_GET['txtnome'];
    $telefone=$_GET['txttlf'];
    $celular=$_GET['txtclr'];
    $email=$_GET['txteml'];
    $dt_nasc=$_GET['txtdtn'];
    $sexo=$_GET['rdosexo'];
    $obs=$_GET['txtobs'];
    
   $sql = "insert into tblcontatos (nome, telefone,celular,email,dt_nasc,sexo,obs)
            values('".$nome."','".$telefone."','".$celular."','".$email."','".$dt_nasc."','".$sexo."','".$obs."')";
    
    mysql_query($sql);
    
    header('location:cadastros.php');
    
    if($nome=="" || $email="")
    {
     /* //echo("<font color ='red'>Dados Obrigatorios</font>") 
        ?>
            <script>
            alert('Dados Obrigatórios');
            </script>
            <?php*/
            
    }
}
?>

    
<html>
    <head>
        <script type="text/javascript">
            
            function validar(caracter,blockType)
            {
                //keyCode
                //which retorna o ascii do Firefox e Chorme 
                //Keycode retorna o ascii pelo Internet Explore
                //alert(caracter.which);
                 //mysql_fetch_array - tranforma o resultado do banco em matriz
                //mysql_fetch_assoc - tranforma o resultado do banco em matriz
                
                //Tratamento para tranforma em ascii independente do navegador
                //sendo o IE(Internet Explore) ou os outros
                if(window.Event)
                {
                    var letra=caracter.charCode;
                }else if(caracter.which)
                    {
                    //Transforma caracter digitado em ascii 
                    var letra=caracter.which;
                    }
                
                //verificação para bloquear numeros ou caracter
                //ou seja, se estiver entre 48 e 57 , conforme a tabela
                //ascii
                if(blockType=='number')
                {
                     
                //Verifica se o caracter digitado é número
                // pu seja, se estiver entre 48 e 57 conforme a tabela ascii
                    if(letra>=48 && letra<=57)
                     {
                         return false;
                     }
                }else if(blockType=='caracter')
                    {
                        if(letra<48 || letra>57)
                            {
                                //Verificaçaõ para liberar algumas teclas
                                //backspace = 8, traço = 45, e espaço = 32
                                if(letra!=8 && letra!=45 && letra!=32)
                                    {
                                        return false;
                                    }
                            }
                    }
               
            }
            
            
        </script>
        <title>Cadastro de Contatos</title>
        <meta charset="utf-8">
        <style>
            #main{
                font-family: serif;
                font-size: 25px;
                color: black;
                text-align: center;
            }
            #titulo{
                background-color: antiquewhite;
                font-family: serif;
                text-align: center;
            }
            .preencher{
                background-color: aliceblue;
            }
            #botao{
                background-color: antiquewhite;
            }
            #consulta{
                font-family: serif;
                text-align: center;
                background-color: bisque;
                color: black;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        
        <!-- patter permite deixa um lembrete-->
        <form name="frmcdtcont" method="get" action="cadastros.php">
            <table border="1" width="600" height="600" align="center" id="main">
                <tr>
                    <td colspan="2" align="center" id="titulo">Cadastros de Contatos</td>
                    
                </tr>
                <tr>
                    <td class="preencher">Nome:</td>
                    <td>
                        <input type="text" name="txtnome" value="" maxlength="30" size="30px" required placeholder="Digite seu nome"  
                               pattern="[a-z A-Z Ã ã õ Õ é É Ê ê Ô ô Ç ç Í í ]*" title="Permitido apenas Letras"
                               onkeypress=" return validar(event,'number')"> </td>
                </tr>
                <tr>
                    <td class="preencher">Telefone:</td>
                    <td><input type="text" name="txttlf" value="" maxlength="30" size="30px" 
                               pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" title="Formato obrigatorio DDD XXXX-XXXX" 
                               placeholder="DDD XXXX-XXXX" onkeypress="return validar(event,'caracter')" >      
                    </td> 
                </tr>
                <tr>
                    <td class="preencher">Celular:</td>
                    <td><input type="text" name="txtclr" value="" maxlength="30" size="30px"  >
                    </td>
                </tr>
                <tr>
                    <td class="preencher">Email:</td>
                    <td>
                        <input type="text" name="txteml" value="" maxlength="30" size="30px" required>
                    </td>
                </tr>
                <tr>
                    <td class="preencher">Data de Nascimento:</td>
                    <td><input type="date" name="txtdtn" value="" maxlength="30" size="30px">
                    </td>
                </tr>
                <tr>
                    <td class="preencher">Sexo:</td>
                    <td><input type="radio" name="rdosexo" value="F" checked>Feminino
                        <input type="radio" name="rdosexo" value="M">Masculino
                    </td>
                </tr>
                 <tr>
                    <td class="preencher">Observação:</td>
                    <td>
                        <textarea name="txtobs" cols="50" rows="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="botao"><input type="submit" name="btnsalvar" value="Salvar">
                        <input type="reset" name="btnlimpar" value="Limpar">
                    </td>
                </tr>
                <table width="900" height="100" align="center" border="1" id="cont">
                    <tr>
                        <td align="center" id="consulta" colspan="6">Consulta de Contatos</td>
                    </tr>
                    <tr  align="center">
                        <td >Nome</td>
                         <td >Telefone</td>
                         <td >Celular</td>
                         <td >Email</td>
                         <td>Opções</td>
                    </tr>
                    <?php 
                        $sql="select * from tblcontatos order by codigo desc";
                        $select=mysql_query($sql);
                        
                        while($rsContatos=mysql_fetch_array($select))
                        {
                            
                    ?>
                    <tr>
                        <td><?php echo($rsContatos['nome']) ?></td>
                        <td><?php echo($rsContatos['telefone']) ?></td>
                        <td><?php echo($rsContatos['celular']) ?></td>
                        <td><?php echo($rsContatos['email']) ?></td>
                        <td>
                            <img src="icones/Modify16.png">
                            <img src="icones/Delete16.png">
                        </td>
                    </tr>
                    <?php 
                            
                        }
                    ?>
                </table>
            </table>
        </form>
    </body>
</html>