<?php
include "valida_cookies.inc"; //valida os cookies

//obtem os valores digitados
$usuario = $_COOKIE["usuario"];
$tipo = $_POST["tipo"];
$descricao = $_POST["descricao"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$valor = $_POST["valor"];
$data = "$ano-$mes-01"; //Data no formato do MySql

if ($descricao == "nova")
	$nova_descricao = $_POST["descricao_nova"];
else
	$nova_descricao = $_POST["descricao_existente"];

$comandoSQL = "insert into receitas_despesas (usuario,descricao,tipo,data,valor) values "; //cria o comando mysql para inserir os dados
$comandoSQL .=" ('$usuario', '$nova_descricao', '$tipo', '$data', $valor)";

//acesso ao banco de dados

include "conecta_banco.inc"; //conecta o banco de dados
$res = mysqli_query($con, $comandoSQL); //insere os dados
echo "<html><body>";
echo "<p align=\"center\">Inclusão Realizada com Sucesso!</p>";
echo "<p align=\"center\"><a href=\"incluir.php?tipo=$tipo\">Incluir outra</a></p>"; //cria link para incluir mais dados do mesmo tipo
echo "<p align=\"center\"><a href=\"principal.php\">Voltar</a></p>"; //cria link para retornar a pagina principal
echo "</body></html>";
mysqli_close($con);//fecha conexao com o banco
?>

