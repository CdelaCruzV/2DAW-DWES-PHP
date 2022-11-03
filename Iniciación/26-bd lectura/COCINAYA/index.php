<?php
	
	$conex1 = mysqli_connect('localhost','root','','cocina') or die ('LA CONEXIÓN HA FALLADO');
	$conex = mysqli_connect('localhost','root','','cocina') or die ('LA CONEXIÓN HA FALLADO');
	$sql = 'select * from recetas where comensales = 6;' or die('LA CONSULTA HA FALLADO');
	$sql1 = 'select * from recetas;' or die('LA CONSULTA HA FALLADO');
	
	echo "<div style='width:80vw;height:100vh;background:yellow;margin:0 auto;'>";
	echo "<h2>RECETAS FACILES</h2>";
	
		if($resultado = mysqli_query($conex,$sql)){
		while ($registro = mysqli_fetch_row($resultado)){
			echo "<div style='width:50%;height:350px;float:left;background:green;border-radius:15px;'>";
			echo $registro[0].'<br>';
			echo "<h2>".$registro[1].'</h2><br>';
			echo $registro[2].'<br>';
			echo $registro[3].'<br>';
			echo $registro[4].'<br>';
			echo $registro[5].'<br>';
			echo $registro[6].'<br>';
			echo $registro[7].'<br>';
			echo $registro[8].'<br>';
			echo '</div>';			
		};
		mysqli_free_result($resultado);
	};
	mysqli_close($conex);
	
	echo "</div><br>";
	echo "<div style='width:80vw;height:100vh;background:gray;margin:0 auto;'>";

	if($resultado1 = mysqli_query($conex1,$sql1)){
		while ($registro1 = mysqli_fetch_row($resultado1)){
			echo "<div style='width:50%;height:350px;float:left;background:green;border-radius:15px;'>";
			echo $registro1[0].'<br>';
			echo "<h2>".$registro1[1].'</h2><br>';
			echo $registro1[2].'<br>';
			echo $registro1[3].'<br>';
			echo $registro1[4].'<br>';
			echo $registro1[5].'<br>';
			echo $registro1[6].'<br>';
			echo $registro1[7].'<br>';
			echo $registro1[8].'<br>';
			echo '</div>';			
		};
		mysqli_free_result($resultado1);
	};
	mysqli_close($conex1);





?>