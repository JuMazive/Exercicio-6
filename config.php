<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
require "conexao.php";

@session_start();

	$code = $_SESSION['code'];
	$senha = $_SESSION['senha'];
	$nome = $_SESSION['nome'];
	$painel = $_SESSION['painel'];

if ($code == '') {
	echo "<script language 'javascript'>window.location='../index.php'; </script>";
}
	elseif ($nome =='') {
		echo "<script language 'javascript'>window.location='../index.php'; </script>";
	
	}elseif ($senha=='') {
		echo "<script language 'javascript'>window.location='../index.php'; </script>";
	}else{

		//$sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$senha'";
		//	$result = mysqli_query($conexao, $sql);
		//	if (mysqli_num_rows($result) <= 0) {
		//	
		//	}

		if ($painel_actual != $painel) {
			echo "<script language 'javascript'>window.location='../index.php'; </script>";
		}
	}
?>

</body>
</html>