<?php 
session_start();
include('conexion.php');
if(isset($_SESSION['email'])){
	$user=$_SESSION['email'];
	$q=mysqli_query($conexion, "SELECT*FROM usuarios WHERE email='$user'");
	$dadosuser=mysqli_fetch_assoc($q);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script type="text/javascript">
	$.noConflict(); /*soluciona los posibles conflictos con las librerias de jquerys*/
	</script>
</head>
<body>
	<a href="logout.php"><button type="">Salir</button></a>
	<span class="user_online" id="<?php echo $dadosuser['id']; ?>"></span>
	<aside id="users_online">
		<ul>
			<?php 

			$id=$dadosuser['id'];

			$pegausuarios= mysqli_query($conexion, "SELECT*FROM usuarios WHERE id!='$id' "); 
			
			while($row=mysqli_fetch_assoc($pegausuarios)){
				
				$blocks=explode(',', $row['blocks']);
				$agora=date('Y-m-d H:i:s');
				if(!in_array($dadosuser['id'], $blocks) ){ 
					$status = 'on';							
						$status = 'off';

					}



			 ?> 
			
		






			<li id="<?php echo $row['id'] ;?>">
				<div class="imgSmall"><img src="<?php if($row['foto'] ==''){echo 'fotos/sinfoto.png';}else{ echo $row['foto'];} ?>" border="0"></div>
				<a href="#" id="<?php echo $dadosuser['id'].':'. $row['id'];?>" class="comecar"><?php echo $row['nome'] ;?></a>	
				<span id="<?php echo $row['id'] ;?>" class="status <?php echo $status ;?>"></span>			
			</li>
			<?php } } ?>	
		</ul>

		
	</aside>
	<aside id="chats">
	</aside>
<script src="js/functions.js"></script>	
</body>
</html>
<?php 
}else{
	echo '<script>window.location="index.php";</script>';
}
 ?>

