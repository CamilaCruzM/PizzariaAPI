<?php 
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
        </style>
        
        <!-- Tipo de TYPES
            required
            type=email - valida a digitação do email
            tel - valida a digitação do telefone(não suportado pelos navegadores)
            number - permite apenas a entrada de números
            range - permite apenas a entrada de números por seleção
            date - permite a entrada de data(não suportado pelos navegadores)
            month - permite a entrada de data / mês (não suportado pelos navegadores)
            color - permite a escolha  de uma cor na palheta de cores do SO e retorna um hexadecimal
            url - valida a digitação de links válidos
            week - traz os dias da semana
            placeholder - texto
        -->
    </head>
    <body>
        <form name="frmcdtcont" method="get" action="cadastro.php">
            <table border="1" width="600" height="600" align="center" id="main">
                <tr>
                    <td colspan="2" align="center" id="titulo">Cadastros de Contatos</td>
                    
                </tr>
                <tr>
                    <td class="preencher">Nome:</td>
                    <td><input type="text" name="txtnome" value="" maxlength="30" size="30px" required placeholder="Digite seu nome"> </td>
                </tr>
                <tr>
                    <td class="preencher">Telefone:</td>
                    <td><input type="text" name="txttlf" value="" maxlength="30" size="30px">      
                    </td> 
                </tr>
                <tr>
                    <td class="preencher">Celular:</td>
                    <td><input type="text" name="txtclr" value="" maxlength="30" size="30px" >
                    </td>
                </tr>
                <tr>
                    <td class="preencher">Email:</td>
                    <td>
                        <input type="email" name="txteml" value="" maxlength="30" size="30px" required>
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
            </table>
        </form>
    </body>
</html>