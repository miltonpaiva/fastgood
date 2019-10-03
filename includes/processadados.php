<?php
require_once'connect_db.php';

//CADASTRA O usuario

  if(@$_GET['go'] == 'cadastraruser'){
    $nome = $_POST['nome'];
    $dt_nasc = $_POST['dt_nasc'];
    $fone = $_POST['fone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $escolaridade = $_POST['escolaridade'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $perfil = $_POST['perfil'];


//INSERINDO DADOS NA TABELA
  mysql_query ("INSERT INTO tab_usuario (nome, dt_nasc, fone, endereco, cpf, rg,escolaridade, login, senha,perfil) 
        VALUES ('$nome','$dt_nasc','$fone','$endereco','$cpf','$rg','$escolaridade','$login','$senha','$perfil')",$dbconn);
  mysql_query("INSERT INTO `pedidos`(`prod_id`) VALUES ('$pedido')",$dbconn);

		echo"<script>alert('Cadastrado com sucesso!')</script>";

//fechando a conexão e redirecionando
  mysql_close($dbconn);
  header('Location:../ver_usuarios.php?msg=1');
}

//CADASTRA PRODUTO

  if(@$_GET['go'] == 'cadastrarp'){
    $pro_nome = $_POST['pro_nome'];
    $imagens = $_FILES['pro_foto']; 
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];

    $nome_imagem = time();
    $destino ="upload/". $nome_imagem .  ".jpg";
    move_uploaded_file($imagens['tmp_name'], $destino);
     
//INSERINDO DADOS NA TABELA
    $sql_code = "INSERT INTO tab_prod(pro_nome,pro_foto,valor, categoria,data) 
          VALUES ('$pro_nome','$destino','$valor','$categoria',NOW())";

    $result = mysql_query($sql_code, $dbconn);
    echo"<script>alert('Cadastrado com êxito!')</script>";

//fechando a conexão e redirecionando
    mysql_close($dbconn);
    header('Location:../ver_produto.php?msg=1');
}


//CADASTRANDO CONTA

  if(@$_GET['go'] == 'cadastrarc'){
    $status = $_POST['status'];
    $codGarcom = $_POST['codGarcom'];
    $pedido= $_POST['pedido'];
    $mesa = $_POST['mesa'];
    $dataAbertura = date('Y-m-d H:i:s');
    $valorTotal = $_POST['valor'];
    

//INSERINDO DADOS NA TABELA
  mysql_query("INSERT INTO tab_conta (status,codGarcom, pedido, mesa, dataAbertura, valorTotal) 
        VALUES ('$status','$codGarcom','$pedido','$mesa','$dataAbertura','$valorTotal')",$dbconn);
    echo"<script>alert('Cadastrado com sucesso!')</script>";

//fechando a conexão e redirecionando
    mysql_close($dbconn);
    header('Location:../ver_conta.php?msg=1');
}