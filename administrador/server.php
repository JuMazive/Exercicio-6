<?php 

	session_start();

	//inicializar variaveis
	$nome = " ";
	$email = " ";
	$id = 0;
	$editar_estado = false;

	// Conexao com a base de dados

	$db = mysqli_connect('127.0.0.1', 'root', '','crud');

	// salvar ao clicar o botao
	if (isset($_POST['gravar'])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];


		$query = "INSERT INTO info (nome, email) VALUES ('$nome', '$email')";
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Email salvo com sucesso.";
		header('location: index.php'); // redirecionar a pagina index apos a insercao


			}


	// actualizar dados
	if (isset($_POST['actualizar'])) {
		$con = mysqli_connect('127.0.0.1', 'root', 'admin123','crud');
				$nome = mysqli_real_escape_string($con, $_POST['nome']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$id = mysqli_real_escape_string($con, $_POST['id']);

				mysqli_query($db, "UPDATE info SET nome='$nome', email='$email' WHERE id=$id");
				$_SESSION['msg'] = "Email actualizado com sucesso.";
				header('location: index.php');
	}	

	//eliminar dados
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "Email eliminado com sucesso.";
				header('location: index.php');	
		
	}	

	// retrive records
	$results = mysqli_query($db, "SELECT * FROM info");



 ?>