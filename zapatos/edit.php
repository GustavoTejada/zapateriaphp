<?php	

//INSERT INTO `shoes` (`id`, `name`, `description`, `price`) VALUES ('1', 'DC', 'son zapatillas', '900');
$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");
if (array_key_exists('id', $_GET)) {

	$id=$_GET['id'];
	$result = mysqli_query($connection, "SELECT * FROM shoes WHERE id = $id");
	while ($shoe = $result->fetch_array()){
		$shoes[] = $shoe;
	}

	if(count($shoes) == 1){
		$shoe = $shoes[0];
	}else{
		header("Location: index.php?error=notFoundEdit");
	}

}else{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	
	mysqli_query($connection, "UPDATE shoes SET name = '$name', description='$description', price=$price WHERE id=$id");
	header("Location:index.php");
}
	mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Zapato <?= $shoe['name']?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">


</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://localhost/pruebaphp">Zapateria</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="http://localhost/pruebaphp/zapatos">Zapatos</a></li>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


<div class="container">
	<h1 class="page-header">
		Editar Zapato <?= $shoe['name']?>
	</h1>
	<form class="form-horizontal" action="edit.php" method="POST">
		<input value="<?= $shoe['id']?>" name="id" type="hidden">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				<input value="<?= $shoe['name']?>" name="name" type="text" class="form-control"  placeholder="Ejemplo: Ricky sarkany">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Descripcion</label>
			<div class="col-sm-10">
				<textarea name="description" class="form-control" rows="5"><?= $shoe['description']?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Precio</label>
			<div class="col-sm-10">
				<input value="<?= $shoe['price']?>" name="price" type="number" step="any" class="form-control"  placeholder="952.2">
			</div>
		</div>

		<div class="modal-footer">
			<!--<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>-->
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>