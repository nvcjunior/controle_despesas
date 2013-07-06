<?php
date_default_timezone_set("America/Sao_Paulo");
if(IsSet($_COOKIE["usuario"])) //verifica se o cookie existe 
    $usuario = $_COOKIE["usuario"]; // cria uma variavel com o valor do cookie
if(IsSet($_COOKIE["senha"])) // verifica se o cookie existe
    $senha = $_COOKIE["senha"]; //cria uma variavel com valor do cookie

if(!(empty($usuario) OR empty($senha))) // verifica se a variavel não esta vazia
{
    include "conecta_banco.inc";
	$res = mysqli_query($con, "SELECT * FROM usuarios_autorizados WHERE usuario='$usuario' and senha='$senha'"); //consulta ao bd
	if(mysqli_num_rows($res)==0) // verifica se os valores de usuario e senha conferem, se nao apaga os cookies
	{
        setcookie("usuario");
        setcookie("senha");
        echo "Você não efetuou o LOGIN!";
        exit;
    }
}
else
{
    echo "Você não efetuou o LOGIN!";
    exit;
}

mysqli_close($con);
?>
