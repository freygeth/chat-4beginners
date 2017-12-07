<?php 
include('conexion.php');
if(isset($_POST['mensagem'])){	
	$de = $_POST['de'];
	$para = $_POST['para'];
	$mensagem = $_POST['mensagem'];
	$time = time();
	if($mensagem != ''){
		$insert=mysqli_query($conexion, "INSERT INTO mensagens(id_de, id_para, mensagem, time, lido) VALUES('$de', '$para', '$mensagem', $time, 0)");
		
		
		if($insert){
			echo "ok";

		}else{
			echo"error";

		}
	}


}
 ?>