<?php
//obtem os valores digitados
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

//acesso ao banco de dados
include "conecta_banco.inc";

$res = mysqli_query($con, "SELECT * FROM usuarios_autorizados where usuario='$usuario' and senha='$senha'"); //executa a consulta no bd
$linhas = mysqli_num_rows($res); //retorna quantas linhas tem a consulta
if ($linhas == 0) //testa se a consulta for igual a zero
{
	echo "<html><body>";
	echo "<p align=\"center\">O login não foi realizado porque os dados digitados são inválidos.</p>";
	echo "<p align=\"center\"><a href=\"index.php\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
	setcookie("usuario", $usuario); //cria cookie $usuario
	setcookie("senha", $senha);		//cria cookie $senha
	header ("Location: principal.php");//direciona para a pagina inicial dos usuarios cadastrados
}
mysqli_close($con); //encerra a conexao com bd
?>