<?php
include "valida_cookies.inc"; //faz a validação dos cookies
$usuario = $_COOKIE["usuario"]; //atribui o cookie a uma variavel
$tipo = $_GET["tipo"]; // atribui o tipo da operação a uma variavel

if ($tipo == "RF")
	$titulo = "RECEITAS FIXAS";        //define a variavel titulo dependento do tipo
	
elseif ($tipo == "RV")
	$titulo = "RECEITAS VARIÁVEIS";
	
elseif ($tipo == "DF")
	$titulo = "DESPESAS FIXAS";
	
elseif  ($tipo == "DV")
	$titulo = "DESPESAS VARIÁVEIS";
?>
<html>
<head>
<title>Controle de gastos mensais</title>

	<script language="javascript">              <!--faz a validação do formulario m javascript-->
	function valida_dados (formulario)
	{
		if(formulario.descricao_nova.value=="" &&
			formulario.descricao[0].checked==true)
			{
			alert ("Você não digitou a descrição.");
			return false;
			}
		if (formulario.ano.value.length<4)
			{
				alert ("Digite o ano com quatro dígitos.");
				return false;
			}
		if (formulario.valor.value=="")
			{
				alert("Você não digitou o valor.");
				return false;
			}
		return true;
	
	}
	</script>
</head>
<body>
<h2 align="center"><font color="#00FF00">$$$</font> Controle de gastos mensais <font color="#00FF00">$$$</font></h2>
<p align="center">Inclusão de <b><?php echo $titulo; ?></b>:</p>
<hr>
<form method="post" action="gravar.php" name="formulario" onSubmit="return valida_dados(this)"><!--envia o formulario para gravar.php se a funcao javascript retornar que os dados sao validos-->
<input type="hidden" name="tipo" value="<?php echo $tipo?>" checked>
<p align="center">
Descrição:<input type="radio" name="descricao" value="nova" checked>
Nova:<input type="text" name="descricao_nova" size="20" onKeyDown="javascript:formulario.descricao[0].checked=true"><!--onkeydown marca botao automatico caso usuario digite uma nova descricao-->
<input type="radio" value="existente" name="descricao"> Existente: <select size="1" name="descricao_existente"
onChange="javascript:formulario.descricao[1].checked=true"><!--se o usuario selecionar uma descricao existente marca o botao automaticamente-->
<?php
//mostra a lista das descrições já existentes para esse tipo
include "conecta_banco.inc";
$res = mysqli_query($con, "SELECT distinct(descricao) FROM receitas_despesas WHERE usuario='$usuario' and tipo=$tipo order by descricao");
$linhas = mysqli_num_rows($res); //retorna o numero de linhas da consulta mysql
    for($i=0; $i<$linhas; $i++)
    {
        $dados = mysqli_fetch_row($res); //atribui o resultado da consulta mysql a $dados
        $descricao = $dados[0]; //atribui o valor contido no array $dados na posicao [0] para variavel descricao
        echo "<option value=\"$descricao\">$descricao</option>"; //cria no formulario um campo com a opção de selecionar as decricoes existentes
    }
    mysqli_close($con); //fecha conexao com o banco de dados
?>
</select>
</p>
<p align="center">Mês: 
<select size="1" name="mes">
	<option value="1">Jan</option>
	<option value="2">Fev</option>
	<option value="3">Mar</option>
	<option value="4">Abr</option>
	<option value="5">Mai</option>
	<option value="6">Jun</option>
	<option value="7">Jul</option>
	<option value="8">Ago</option>
	<option value="9">Set</option>
	<option value="10">Out</option>
	<option value="11">Nov</option>
	<option value="12">Dez</option>
</select>
Ano: <input type="text" name="ano" size="4" maxlength="4" value="<?php echo date("Y" ,time()); ?>">
</p>
<p align="center">Valor: <input type="text" name="valor" size="10" maxlength="10"></p>
<p align="center"><input type="submit" value="Enviar" name="enviar"></p>
</form>
<hr>
</body>
</html>
