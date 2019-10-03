<?php 
  $inc = new Controller();
  $inc->includeParts("header");

  $pdo = $inc->DB;
  
?>
<body>
<div class="container">
  <?php  $inc->includeParts("menu"); ?>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    Cadastrar Produto
  </button>
  <!-- /Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#333;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Cadastrar um Produto</h4>
        </div>

        <div class="modal-body">
          <form action="processadados.php?go=cadastrarp" enctype="multipart/form-data" method="post" class="form-group">
            Nome:
        		<div class="form-group">
        		  <input type="text" name="pro_nome" class="form-control"  required >
            </div>
            Imagen Produto:
            <div class="form-group">
              <span class="btn btn-default btn-file">
                Procurar <input type="file" name="pro_foto" class="form-control" >
              </span>
            </div>
            Valor:
        		<div class="form-group">
        		  <input type="text" name="valor" onKeyPress="return(MascaraMoeda(this,'.',',',event))" class="form-control"  required>
            </div>
            Categoria:
            <div class="form-group">
          		<select name="categoria" class="form-control" >
          			<option>Hamburgues</option>
                <option>Saladas</option>
                <option>Bebidas</option>
                <option>Sobremesa</option>
          		</select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div> 
      </div>
    </div>
  </div>
  <!-- /Modal -->

  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    switch ($msg) {
      case 1:
  ?>
        <div class="alert alert-success" role="alert" style="height:relative;width:690px;left:325px;margin-top:10px;text-align:center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          Produto Cadastrado com sucesso!
        </div>
  <?php
      }
    }
  ?> 
  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    switch ($msg) {
      case 2:
  ?>
        <div class="alert alert-info" role="alert" style="height:relative;width:690px;left:325px;margin-top:10px;text-align:center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
          Produto alterado com sucesso!
        </div>
  <?php
      }
    }
  ?> 
  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    switch ($msg) {
      case 3:
  ?>
        <div class="alert alert-danger" role="alert" style="height:relative;width:690px;left:325px;margin-top:10px;text-align:center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          Produto excluido com sucesso!
        </div>
  <?php
      }
    }
  ?> 
  <div class="row marketing" style="border: 1px solid rgb(225, 232, 237); border-radius: 4px; ">
    <h4 class="text-center">Lista de Produtos Cadastrados</h4>
    <div class="col-lg-10">
    	<table class="table" style="margin-top:10px;margin-left:55px;">
        <thead>
          <tr>
            <td style="font-weight:bold;">ID</td>
            <td style="font-weight:bold;">Nome do Protudo</td>
            <td style="font-weight:bold;">Valor</td>
            <td style="font-weight:bold;">Categoria</td>
            <td style="font-weight:bold;">Alterar</td>
            <td style="font-weight:bold;">Excluir</td>
          </tr>
        </thead>
        <?php 
          // $result = $pdo->query("SELECT * FROM tab_produtos ORDER BY valor DESC");
          // $produtos = $result->fetchAll();

          // if ($produtos) {
          //   foreach ($produtos as $row) {
        ?>
            <tbody>
              <td>
                <?php echo "<p></p>", @$row['codProd'] ?>
              </td>
              <td>
                <?php echo "<p></p>", @$row['nome'] ?>
              </td>
              <td>
                <?php echo "<p></p>R$", @$row['valor'] ?>
              </td>
              <td>
                <?php echo "<p></p>", @$row['forCategoria'] ?>
              </td>
              <td>
                <form action="alterar_produto.php?pro_id=<?php echo $row['pro_id'];?>" method="POST">
                  <input type="submit" value="Alterar" name="Submit" class='btn btn-sm btn-primary'>
                </form>
              </td>
              <td>
                <form action="includes/functions/excluir_produtos.php?pro_id=<?php echo $row['pro_id']; ?>" method="POST">
                  <input type="submit" value="Excluir" name="Submit" class='btn btn-sm btn-danger'>
                </form>
              </td>
            </tbody>
        <?php 
          //   }
          // }
        ?>
      </table>
  	</div>
  </div>

<?php 
  $inc->includeParts("footer");
?>
