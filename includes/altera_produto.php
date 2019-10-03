<meta charset="UTF-8" lang="pt-br">
<?php 
  $pro_id = $_POST['pro_id'];
  $pro_nome = $_POST['pro_nome'];
  $valor = $_POST['valor'];
  $categoria = $_POST['categoria'];
 
  include '../connect_db.php';


  $resultado = mysql_query("UPDATE tab_prod SET pro_nome='$pro_nome',valor='$valor',categoria='$categoria' WHERE pro_id ='$pro_id' ");

  @mysql_free_result($resultado);
  mysql_close($dbconn);
 header('Location:../ver_produto.php?msg=2');


?>