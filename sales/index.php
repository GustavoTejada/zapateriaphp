<?php	

function getSales(){
	$sales=[];

	$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");

	$result = mysqli_query($connection, "SELECT * FROM sales");
	while ($sale = $result->fetch_array()){
		$sales[] = $sale;
	}

	mysqli_close($connection);

	return $sales;
}

function getShoes(){
	$shoes=[];

	$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");

	$result = mysqli_query($connection, "SELECT * FROM shoes");
	while ($shoe = $result->fetch_array()){
		$shoes[] = $shoe;
	}

	mysqli_close($connection);

	return $shoes;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado de zapatos</title>
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
					<li><a href="http://localhost/pruebaphp/zapatos">Ventas</a></li>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


<div class="container">
	<?php
		if (array_key_exists('error', $_GET)) {
			$error = $_GET['error'];
			$title_message = '';
			$body_message = '';
			switch ($error) {
				case 'notFoundEdit':
				$title_message = ' Zapato inexistente ';
				$body_message = ' El zapato que se desea editar no se encuentra registrado';
				break;

				default:
				break;
			}
			if ($title_message) {
				echo '
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>' . $title_message . '</strong>' . $body_message . '
				</div>';
			}
		}
	?>
	

	<h1 class="page-header">
		Ventas
		<div class="pull-right">
			<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#agregar_zapato">Agregar ventas</button>
			</div>
		</div>
	</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>N° de Venta</th>
				<th>Fecha</th>
				<th>Cantidad</th>
				<th>Producto</th>
			</tr>
		</thead>
		<tbody .table-striped>
			<?php $sales = getSales();?>
			<?php foreach($sales as $sale){ ?>
				<tr>
					<tr>
						<td><?php echo $sale["ID"]?></td>
						<td><?php echo $sale["Fecha"]?></td>
						<td><?php echo $sale["Cantidad"]?></td>
						<td><?php echo $sale["Shoe_ID"]?></td>
						<td>
							<a href="edit.php?id=<?= $sale["ID"]?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							<a class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
						</td>
					</tr>
				</tr>
			<?php }?>
		</tbody>
	</table>
	
	<!-- Modal -->
	<div class="modal fade" id="agregar_zapato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<form class="form-horizontal" action="add.php" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Agregar Ventas</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label class="col-sm-2 control-label">Fecha</label>
							<div class="col-sm-10">
								<input name="Fecha" type="date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Cantidad</label>
							<div class="col-sm-10">
								<input name="Cantidad" type="number" step="1" class="form-control"  placeholder="1">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Producto</label>
							<div class="col-sm-10">
								<?php $shoes = getShoes();?>
								<select name="Shoe_ID" type="number">
									<?php foreach($shoes as $shoe){?>
										<option value="<?= $shoe['id']?>"><?= $shoe['name']?></option>
									<?php }?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>