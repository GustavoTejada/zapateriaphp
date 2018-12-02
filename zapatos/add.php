<?php

$connection = mysqli_connect("localhost","GustaMan","1234","zapateria");

$name 			= $_POST["name"];
$description 	= $_POST["description"];
$price			= $_POST["price"];

mysqli_query($connection, "INSERT INTO `shoes` (`name`, `description`, `price`) VALUES ('$name', '$description', '$price')");

mysqli_close($connection);

header("Location:index.php");