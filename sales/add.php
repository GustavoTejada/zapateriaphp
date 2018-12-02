<?php

$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");

$Fecha = $_POST["Fecha"];
$Cantidad = $_POST["Cantidad"];
$Shoe_ID = $_POST["Shoe_ID"];

mysqli_query($connection, "INSERT INTO `sales` (`Fecha`, `Cantidad`, `Shoe_ID`) VALUES ('$Fecha', '$Cantidad', '$Shoe_ID')");

mysqli_close($connection);

header("Location:index/sales.php");