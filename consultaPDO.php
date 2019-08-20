<!DOCTYPE html>
<html>
<head>
	<title>POO</title>
</head>
<body>

<?php
$busca=$_GET["buscar"];
try{
	
	$base=new PDO('mysql:host=localhost;dbname=pruebas','root','');
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$base->exec("set character set utf8");
	$sql="select nombreartículo,sección,precio,paísdeorigen from productos where nombreartículo= ?";
	//echo "conexion OK";
	$resultado=$base-> prepare($sql);
	//$resultado->execute(array("Destornillador"));
	$resultado->execute(array($busca));
	while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

		echo "Nombre Articulo: " . $registro["nombreartículo"] . " Seccción: " . $registro["sección"] . " Precio: " . $registro["precio"] . " Pais de origen: " . $registro["paísdeorigen"] . "<br>";

	}
	$resultado->closeCursor();
    }
	catch(Exception $e)
	{
		//die('Error: ' . $e->GetMessage());
		echo "Codigo del error: " . $e->getCode();//genera un codigo de error en el caso de que la tabla no exista
	}finally
	{
        $base=null;
    }
?>

</body>
</html>