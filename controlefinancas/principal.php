<?php
include "valida_cookies.inc";
?>
<html>
<head>
<title>Controle de gastos mensais</title>
</head>
<body>
<h2 align="center"><font color="#00FF00">$$$</font> Controle de gastos mensais <font color="#00FF00">$$$</font></h2>
<p align="center">Usuário: <b><?php echo $_COOKIE["usuario"];?></b></p>
<p align="center">Seja bem vindo! Escolha a opção desejada: </p>
<hr>
<p align="center">
<font size="4"><b>Incluir:</b><br>
<a href="incluir.php?tipo=RF"><font size="4">Receitas Fixas</font></a><br>
<a href="incluir.php?tipo=RV"><font size="4">Receitas Variáveis</font></a><br>
<a href="incluir.php?tipo=DF"><font size="4">Despesas Fixas</font></a><br>
<a href="incluir.php?tipo=DV"><font size="4">Despesas Variáveis</font></a><br>
</font></p>
<p align="center">
<font size="4"><b>Visualizar:</b><br>
<a href="periodo.php"><font size="4">Planilha de gastos mesais</font></a>
</font></p>
<p align="center">
<font size="4"><b>Excluir</b><br>
<a href="excluir.php"><font size="4">Excluir receitas e despesas</font></a><br>
</font></p>
<hr>
<p align="center"><a href="logout.pgp"><font size="3">Logout</font></a></p>
</body>
</html>