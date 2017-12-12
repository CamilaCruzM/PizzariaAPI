<?php
// Conexao com Banco de Dados 

//Estabelecendo conexao com banco de dados
$conexao=mysql_connect('localhost','root','bcd127');
    
//Ativa o banco de dados
mysql_select_db("dbpizzariafrajolas");

//Inserti do botão Salvar
if(isset($_POST["btnsalvar"]))
{
    //Variaveis do banco de dados
    $nome=$_POST['txtnome'];
    $telefone=$_POST['txttel'];
    $celular=$_POST['txtcel'];
    $email=$_POST['txtemail'];
    $homepage=$_POST['urlhome'];
    $link=$_POST['urllink'];
    $sugestao=$_POST['txtsgc'];
    $sexo=$_POST['rdosexo'];
    $informacao=$_POST['txtinfo'];
    $profissao=$_POST['txtpfs'];
    
    //Inserindo  dados na tabela fale conosco 
    $sql ="insert into tblfaleconosco(nome,telefone,celular,email,homepage,link,sugestao,sexo,informacao,profissao)
    
    values('".$nome."','".$telefone."','".$celular."','".$email."','".$homepage."','".$link."','".$sugestao."','".$sexo."','".$informacao."','".$profissao."')";
    
   mysql_query($sql);
    //echo ($sql);
    
    //header('location:faleconosco.php);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fale conosco</title>
        <link rel="stylesheet" type="text/css " href="CSS/style.css">
        <meta charset="utf-8">
    </head>
    <body>
        
            <header>
                <div id="principal">
                    <!---Logo----->
                    <div id="logo">
                        <img src="imagem/loginho.png" alt="Pizzaria Frajola's" title="Pizzaria Frajola's">
                        </div>
                    <!---menu----->
                      <nav id="menu">
                        <div class="caixa_menu">
                            <a href="pizzaria.php.php" class="link">
                                Home
                            </a>
                            </div>
                            <div class="caixa_menu">
                                <a href="curiosidades.php" class="link">
                                    Curiosidades
                                </a>
                            </div>
                        <div class="caixa_menu">
                            <a href="nossosambientes.php" class="link">
                              Nossos Ambientes
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="pizzadomes.php" class="link">
                                A pizza do mês
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="sobreapizzaria.php" class="link">
                                Sobre a Pizzaria
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="promocoes.php" class="link">
                                Promoções
                            </a>
                        </div>
                        <div class="caixa_menu">
                            <a href="faleconosco.php" class="link">
                               Fale Conosco
                            </a>
                        </div>
                    </nav>
                </div>
            </header>
            <!---conteudo----->
            <div id="conteudo">
                <form name="frmpizzaria" method="post" action="faleconosco.php">
                <table border="1" width="800" height="1400" align="center" id="main">
                    <tr>
                        <td colspan="2" align="center" id="titulo">Fale Conosco</td>
                    </tr>
                    <tr>
                        <td class="preencher">Nome</td>
                        <td><input type="text" name="txtnome" maxlength="30" size="30px" value="" placeholder="Digite seu Nome" required></td>
                    </tr>
                    <tr>
                        <td class="preencher">Telefone</td>
                        <td><input type="text" name="txttel" maxlength="12" size="30px" value="" placeholder="Digite seu Telefone"></td>
                    </tr>
                    <tr>
                        <td class="preencher">Celular</td>
                        <td><input type="text" name="txtcel" maxlength="12" value="" size="30px" placeholder="Digite seu  Celular" required></td>
                    </tr>
                    <tr>
                        <td class="preencher">Email</td>
                        <td><input type="text" name="txtemail" value="" maxlength="30" size="30px" placeholder="Digite seu Email" required></td>
                    </tr>
                    <tr>
                        <td class="preencher">Home Page</td>
                        <td><input type="url" name="urlhome" value="" maxlength="30" size="30px" placeholder="Digite sua Home Page"></td>
                    </tr>
                    <tr>
                        <td class="preencher">Link no Facebook</td>
                        <td><input type="url" name="urllink" value="" maxlength="30" size="30px" placeholder="Digite seu link do Facebook"></td>
                    </tr>
                    <tr>
                        <td class="preencher">Sugestão/Critica</td>
                        <td>
                            <textarea name="txtsgc" cols="50" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="preencher">
                            Informações do Produto
                        </td>
                        <td>
                             <textarea name="txtinfo" cols="50" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr id="teste">
                        <td class="preencher">Sexo</td>
                        <td><input type="radio" name="rdosexo" value="F" required checked>Feminino
                        <input type="radio" name="rdosexo" value="M">Masculino</td>
                    </tr>
                    <tr>
                        <td class="preencher">Profissão</td>
                        <td ><input type="text" name="txtpfs" value="" maxlength="30" size="30px" required></td>
                    </tr>
                    <tr>
                        <!---botoes----->
                        <tr>
                        <td colspan="2"  id="botao">
                            <input type="submit" name="btnsalvar" value="Salvar">
                            <input type="reset" name="btnlimpar" value="Limpar">
                        </td>
                    </tr>
                </table>
            </form>
            </div>
        <!---rodape----->
        <footer></footer>
    </body>
</html>