<!DOCTYPE html>
<html>
<head>
	<title>Big Software Lda</title>

	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

	<link rel="shortcut icon" href="img/logo.png"/>

	<?php require "conexao.php"?>
</head>
<body>

<div id="logo">
	<img src="img/logoin.png" />
</div>

<div id="caixa-login">

	<?php
	if (isset($_POST['button'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		if ($email == '') {

			echo "<h2> Por Favor, digite o seu email de acesso! </h2>";
		}

			else if ($password == '') {

			echo "<h2> Por Favor, digite sua senha! </h2>";	
			
		}else{
			$sql = "SELECT * FROM login WHERE email = '$email' AND senha = '$password'";
			$result = mysqli_query($conexao, $sql);
			if (mysqli_num_rows($result) > 0) {

				while ($res_1 = mysqli_fetch_assoc($result)) {
					$status = $res_1['status'];
					$email = $res_1['email'];
					$senha = $res_1['senha'];
					$nome = $res_1['nome'];
					$painel = $res_1['painel'];

					if ($status == 'Inativo') {
						echo "<h2> Voce esta inactivo, por favor contacte a administracao!</h2>";
					}else{

						session_start();
						$_SESSION['email'] = $email;
						$_SESSION['nome'] = $nome;
						$_SESSION['senha'] = $senha;
						$_SESSION['painel'] = $painel;

						if ($painel=='administrador') {
							echo "<script language = 'javascript'> window.location ='administrador'; </script>";
						}elseif ($painel == 'cliente') {
							echo "<script language = 'javascript'> window.location ='cliente'; </script>";
						}
					}
				}

			}else{
				echo "<h2>Dados incorrectos!</h2>";
			}
		}
	}
	?>
	<form name="form" method="post" action="" enctype="multipart/form-data">

		<table>
			<tr>
				<td><h1>Email de acesso:</h1></td>
			</tr>

			<tr>
				<td><input type="text" name="email"></td>
			</tr>

			<tr>
				<td><h1>Senha:</h1></td>
			</tr>

			<tr>
				<td><input type="password" name="password"></td>
			</tr>

			<tr>
				<td><input class="input" type="submit" name="button" value="Entrar"></td>
			</tr>
		</table>
</div>

</body>
</html>