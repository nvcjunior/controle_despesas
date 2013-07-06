<?php
include "valida_cookies.inc";
?>
<html>
<head>
<title>Controle de gastos mensais</title>
</head>
<body>
<h2 align="center"><font color="#00FF00">$$$</font> Controle de gastos mensais ><font color="#00FF00">$$$</font></h2>
<p align="center">Escolha o periodo da visualização:</p>
<hr />
<form method="POST" action="planilha.php">
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
Ano: <input type="text" name="ano" size="4" maxlength="4" value"<?php echo date("Y",time()); ?>">
</p>
<p align="center">até</p>
<p align="center">Mês:
<select size="1" name="mes2">
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
Ano: <input type="text" name="ano2" size="4" maxlength="4" value"<?php echo date("Y",time()); ?>">
</p>
<p align="center">&nbsp;<input type="submit" value="Visualizar" name="ok"></p>
</form>
<hr>
</body>
</html>