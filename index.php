<?php	

//INSERT INTO `shoes` (`id`, `name`, `description`, `price`) VALUES ('1', 'DC', 'son zapatillas', '900');

function getShoes(){
	$shoes=[];

	$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");

	$result = mysqli_query($connection, "SELECT * FROM shoes");
	while ($shoe = $result->fetch_array()){
		$shoes[] = $shoe;
	}


	return $shoes;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Prueba PHP</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>N° Producto</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody .table-striped>
				<?php $shoes = getShoes();?>
				<?php foreach($shoes as $shoe){ ?>
					<tr>
						<tr>
							<td><?php echo $shoe["id"]?></td>
							<td><?php echo $shoe["name"]?></td>
							<td><?php echo $shoe["description"]?></td>
							<td><?php echo $shoe["price"]?></td>
						</tr>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</body>
</html>