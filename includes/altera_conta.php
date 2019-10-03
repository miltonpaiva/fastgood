<meta charset="UTF-8" lang="pt-br">
<?php 
  $id_conta = $_POST['id_conta'];
  $status = $_POST['status'];
  $pedido = $_POST['pedido'];
  $mesa = $_POST['mesa'];
  $valorTotal = $_POST['valorTotal'];

  include '../connect_db.php';
mysql_query("DELETE FROM `conta`");
  $resultado = mysql_query("UPDATE tab_conta SET id_conta='$id_conta', status='$status', pedido='$pedido',mesa='$mesa', valorTotal='$valorTotal' WHERE id_conta ='$id_conta' ");

  @mysql_free_result($resultado);

// mysql_query("DELETE FROM `fastfood`.`pedido`") or die ("Error:".mysql_error());
mysql_close($conexao);
 
 mysql_close($dbconn);
    header('Location:../ver_conta.php?msg=2');

?>