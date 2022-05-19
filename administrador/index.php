<?php $painel_actual = "administrador"; ?>

<?php include('server.php'); 


	if (isset($_GET['editar'])) {
		$id = $_GET['editar'];
		$editar_estado=true;

		$conn = new PDO('mysql:host=localhost; dbname=info, $nome, $email');
		$nome = $record['nome'];
		$email = $record['email'];
		$id = $record['id'];
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>Eventos</title>
	<?php require "../config.php"; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<form method="post" action="server.php">
	<input type="hidden" name="id" value="<?php echo $id ?>">	


		

		<div class="input-group">
			<label>Numero de Evento</label>
			<input type="text" placeholder="Numero de Evento" pattern="[0-9]"   title="Somente números">
		</div>

		<div class="input-group">
			<label>Bilhetes Disponiveis</label>
			<input type="text" placeholder="Numero de bilhetes Existentes" pattern="[0-9]"   title="Somente números">
		</div>


		<div class="input-group">
			<label>Data</label>
            <input type="date"  data-placement="top">
            <span class="highlight"></span>
            <span class="bar"></span>
            
        </div>

		<div class="input-group">
			<label>Categoria</label>
			<select>
			<option value="" disabled="" selected="">Selecciona uma categoria</option>
    		<option value="Categoria">Show</option>
        	<option value="Categoria">Teatro</option>
        	<option value="Categoria">Palestra</option>
			</select>
		</div>

		<div class="input-group">

		


			
			<?php if ($editar_estado==false): ?>
				<button type="submit" name="gravar" class="btn">Gravar</button>
			<?php endif ?>
			<button type="reset" name="btn-limpar" class="btn">Limpar</button>
			<button type="submit" name="tela-cadastro" class="btn">Ver Lista de cadastro</button>
			
		</div>
	</form>

</body>
</html>