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
          <form action="" enctype="multipart/form-data" method="post" class="form-group">
            <label for="formGroupExampleInput">Nome:</label>
        		<div class="form-group">
        		  <input type="text" name="pro_nome" class="form-control"  required >
            </div>
            <label for="formGroupExampleInput">Imagen Produto:</label>
            <div class="form-group">
              <span class="btn btn-default btn-file">
                <label for="formGroupExampleInput">Procurar</label> <input type="file" name="pro_foto" class="form-control" >
              </span>
            </div>
            <label for="formGroupExampleInput">Valor:</label>
        		<div class="form-group">
        		  <input type="number" name="valor" onKeyPress="" class="form-control" placeholder="R$: 0,00" min="0" step="0.10" required>
            </div>
            <label for="formGroupExampleInput">Categoria:</label>
            <div class="form-group">
              <?php $inc->includeModel('categorias/select'); ?>
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

  <!-- LISTAGEM -->
  <div class="row marketing" style="border: 1px solid rgb(225, 232, 237); border-radius: 4px; ">
    <h4 class="text-center">Lista de Produtos Cadastrados</h4>
    <div class="col-lg-10">
      <?php $inc->includeModel('produtos/listagem'); ?>
  	</div>
  </div>
  <!-- /LISTAGEM -->

<?php 
  $inc->includeParts("footer");
?>
