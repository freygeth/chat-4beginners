<?php
session_start();
?>
<?php
include 'conexion.php';

if(isset($_POST['login'])){
	$email = $_POST['email'];
    //$password = $_POST['password'];
    $e = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email = '$email'");
    if(mysqli_num_rows($e)>0){
    	$row = mysqli_fetch_array($e);  
    	$_SESSION["email"] = $row['email'];
    	$agora =date('Y-m-d H:i:s');
        $limite =date('Y-m-d H:i:s', strtotime('+2 min'));
        $update = mysqli_query($conexion, " UPDATE usuarios SET horario='$agora', limite='$limite' WHERE email = '$email' ");

        echo header("Location:chat.php");;
    }else{
    	header("Location:index.php");    	
    }
}

?>
