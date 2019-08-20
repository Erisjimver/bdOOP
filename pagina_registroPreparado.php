<!DOCTYPE html>
<html>
<head>
	<title>Base de datos</title>
</head>
<body>

<?php

	$codigo=$_GET["c_art"];
	$seccion=$_GET["secc"];
	$nombre=$_GET["n_art"];
	$precio=$_GET["pre"];
	$fecha=$_GET["fec"];
	$importado=$_GET["imp"];
	$pais=$_GET["p_ori"];
	try{
		$base=new PDO('mysql:host=localhost;dbname=pruebas','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$base->exec("set character set utf8");

	$sql="insert into productos (códigoartículo, sección,nombreartículo,precio,fecha,importado,paísdeorigen) values (:codigo,:seccion,:nombre,:precio,:fecha,:importado,:pais)";
		$resultado=$base->prepare($sql);
		
	$resultado->execute(array(":codigo"=>$codigo,":seccion"=>$seccion,":nombre"=>$nombre,":precio"=>$precio,":fecha"=>$fecha,":importado"=>$importado,":pais"=>$pais));

	echo "registro insertado";

	$resultado->closeCursor();//cerrar 
	}
	catch(Exception $e)
	{
		echo "Codigo del error: " . $e->getCode();//genera un codigo de error en el caso de que la tabla no exista
	}finally
	{
        $base=null;
    }
?>

</body>
</html>



