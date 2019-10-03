<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script type="text/javascript">
		function loginsuccessfully(){
			setTimeout("window.location='../index.php'",1500);
		}
		</script>
</head>
<body>
<?php
//INÍCIALIZA A SESSÃO
	session_start();
//DESTRÓI AS VARIÁVEIS
	setcookie("logado","");
	unset($_SESSION['email']);

	session_destroy();
//REDIRECIONA PARA A TELA DE LOGIN/
	/*
	echo "<script> window.location=\"../index.php\"</script>";*/
	echo "<script>loginsuccessfully()</script>";
	header('Location:../index.php?msg=2');

?>
</body>
</html>
