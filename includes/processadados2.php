<?php
require_once'connect_db.php';

//CADASTRANDO CONTA

  if(@$_GET['go'] == 'cadastrarc'){
    $status = $_POST['status'];
    $codGarcom = $_POST['codGarcom'];
    $pedido= $_POST['pedido'];
    $mesa = $_POST['mesa'];
    $dataAbertura = date('Y-m-d H:i:s');
    $valorTotal = $_POST['valorTotal'];
    

//INSERINDO DADOS NA TABELA
  mysql_query("INSERT INTO tab_conta (status,codGarcom, pedido, mesa, dataAbertura, valorTotal) 
        VALUES ('$status','$codGarcom','$pedido','$mesa','$dataAbertura','$valorTotal')",$dbconn);
  mysql_query("INSERT INTO `pedidos`(`prod_id`) VALUES ('$pedido')",$dbconn);
    echo"<script>alert('Cadastrado com sucesso!')</script>";

//fechando a conexão e redirecionando
    mysql_close($dbconn);
    header('Location:../ver_conta2.php?msg=1');
}
?>