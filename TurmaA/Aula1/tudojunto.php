<html>
    <head>
        <title>Atividade</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form name="frmtdj" method="post" action="tudojunto.php">
            <table width="200" height="300" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" align="center">Pares e Ímpares</td>
                </tr>
                <tr>
                    <td>Valor Inicial:</td>
                    <td>
                        <select name="vlrinc">
                            <option value="" selected> Escolha um valor
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Valor Final</td>
                    <td>
                        <select name="vlrfinal">
                            <option value="" selected> Escolha outro valor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="radio" name="btnoperacao" value="Crescente"></td>
                    <td>Crescente</td>
                </tr>
                <tr>
                    <td><input type="radio" name="btnoperacao" value=""></td>
                    <td>Decrescente</td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnCalcular" value="Calcular"></td>
                </tr>
                <tr>
                    <td><input type="reset" name="btnLimpar" value="Limpar"></td>
                </tr>
                <tr>
                    <td colspan="2">Números Pares</td>
                </tr>
                <tr>
                    <td colspan="2">Números Ímpares</td>
                </tr>
                <tr>
                    <td colspan="2">Quantidade de números pares:</td>
                </tr>
                <tr>
                    <td colspan="2">Quantidade de números ímpares:</td>
                </tr>
                <tr>
                    <td colspan="2">Soma dos números pares:</td>
                </tr>
                <tr>
                    <td colspan="2">Soma dos números ímpares::</td>
                </tr>
            </table>
        </form>
    </body>
</html>