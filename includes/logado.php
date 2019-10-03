<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/fastfood/includes/connect_db.php';

  	$pdo = Database::conexao();

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$result = $pdo->query("SELECT * FROM tab_usuario WHERE login = '$login' AND senha = '$senha'");
	$has_user = $result->fetch();

	if (count($has_user) > 0) {

				if($has_user["perfil"] == 1){
	  				if (!isset($_SESSION)){
	  					session_start();
	  					set_time_limit(0);
	  					
	  					$_SESSION['login'] = $_POST['login'];
						setcookie("logado","1");
						header('Location:'.$_SERVER['HTTP_ORIGIN'].'/fastfood/home.php?msg=2');
	  				}else{
						setcookie("logado","1");  					
	  				}
				}

				if($has_user["perfil"] == 0){
					if (!isset($_SESSION)){

						session_start();
						set_time_limit(0);
  						$_SESSION['login']=$_POST['login'];
						header('Location:'.$_SERVER['HTTP_ORIGIN'].'/fastfood/home2.php?msg=2');
					}
				}

	}else{
		header('Location:../index.php?msg=1');
	}
?>