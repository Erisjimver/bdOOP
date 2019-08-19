<!DOCTYPE html>
<html>
<head>
	<title>POO</title>
</head>
<body>

<?php

	$conexion = new mysqli("localhost", "root", "", "pruebas");

	if($conexion ->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno;
	}

	//mysqli_set_charset($conexion,"utf8");
	$conexion->set_charset("utf8");

	$sql="select * from productos";

	//$resultados=mysqli_query($conexion,$sql);
	$resultados= $conexion->query($sql);

	if($conexion->errno){
		die($conexion->error);
	}
/*
	while($fila=mysqli_fetch_array($resultados,MYSQL_ASSOC)){

	}
*/
echo "<table border=1>";
echo "<caption>productos</caption>";
echo 	"<tr>";
echo 		"<th>Codigo Articulo</th>";
echo 		"<th>Seccion</th>";
echo 		"<th>Nombre articulo</th>";
echo 		"<th>Precio</th>";
echo 		"<th>Fecha</th>";
echo 		"<th>Importado</th>";
echo 		"<th>Pais de origen</th>";
echo 	"</tr>";
	//si se usa el metodo fetch_array se deben colocar en lugar del nombre de los indices, se coloca 0 1 2 3 4 5 6 7 que representan la posicion de los indices
	while($fila=$resultados->fetch_assoc()){
		echo 	"<tr>";
		echo 		"<td>" . $fila['CÓDIGOARTÍCULO']. "</td>";
		echo		"<td>" . $fila['SECCIÓN']. "</td>";
		echo		"<td>" . $fila['NOMBREARTÍCULO']. "</td>";
		echo		"<td>" . $fila['PRECIO']. "</td>";
		echo		"<td>" . $fila['FECHA']. "</td>";
		echo		"<td>" . $fila['IMPORTADO']. "</td>";
		echo		"<td>" . $fila['PAÍSDEORIGEN']. "</td>";
		
		echo 	"</tr>";
		
		
	}
	//mysqli_close($conexion);
	$conexion->close();
?>

</body>
</html>