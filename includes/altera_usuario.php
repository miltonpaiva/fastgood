<meta charset="UTF-8" lang="pt-br">
<?php 
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $dt_nasc = $_POST['dt_nasc'];
  $fone = $_POST['fone'];
  $endereco = $_POST['endereco'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $escolaridade = $_POST['escolaridade'];
  $login = $_POST['login'];
  $senha = $_POST['senha'];


  include '../connect_db.php';


  $resultado = mysql_query("UPDATE tab_usuario SET nome='$nome', dt_nasc='$dt_nasc',fone='$fone',endereco='$endereco',cpf='$cpf',rg='$rg',escolaridade='$escolaridade',login='$login',senha='$senha' WHERE id ='$id' ");

  @mysql_free_result($resultado);
  mysql_close($dbconn);
  header('Location:../ver_usuarios.php?msg=3');



?>