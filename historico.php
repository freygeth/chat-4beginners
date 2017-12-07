<?php 
include('conexion.php');
if(isset($_POST['conversacom'])){
	$mensagens = array();
	$id_conversa = (int)$_POST['conversacom'];
	$online = (int)$_POST['online'];

	$pegaConversas = mysqli_query($conexion, "SELECT*FROM mensagens WHERE (id_de ='$online' AND id_para = '$id_conversa') OR (id_de ='$id_conversa' AND id_para = '$online') ORDER BY id DESC LIMIT 10");
	
	while($row=mysqli_fetch_assoc($pegaConversas)){
		$fotouser = ''; 
		if($online == $row['id_de']){
			$janela_de = $row['id_para']);

		}elseif($online == $row['id_para']){
			$janela_de = $row['id_de']; 
			
			$pegaFoto = mysqli_query($conexion, "SELECT foto FROM usuarios WHERE id ='$janela_de'");
		
			while($usr=mysqli_fetch_assoc($pegaFoto)){
				if($usr['foto'] =''){
					$fotouser = 'fotos/sinfoto.png'; 
				}else{

					$fotouser = $usr['foto'];
				}


			}


		}

		$emotions = array(':)', ':@', '8)');
		$imgs = array(
			'<img src="emotions/happy.png" width="14"/>',
			'<img src="emotions/angry.png" width="14"/>',
			'<img src="emotions/cool.png" width="14"/>'
			);
		
		$msg = str_replace($emotions, $imgs, $row['mensagem']); 
		
		$mensagens['id'] = '$row["id"]';
		$mensagens['mensagem'] = '$msg';
		$mensagens['fotoUser'] = '$fotouser' ;
		$mensagens['id_de'] = '$row["id_de"]' ;
		$mensagens['id_para'] = '$row["id_para"]';
		$mensagens['janela_de'] = '$janela_de' ;
		
	
	}
die(json_encode($mensagens));





}



 ?>