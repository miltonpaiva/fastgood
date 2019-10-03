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
      Adicionar Funcionario
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#333;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Adicionar Funcionario</h4>
          </div>
          <div class="modal-body">
            <form action="includes/processadados.php?go=cadastraruser" name ="formulario" id="formulario" method="post" class="form-group">
              Nome:
              <div class="form-group">
                <input type="text" name="nome" class="form-control" required>
              </div>
              Data de Nascimento:
              <div class="form-group">
                <input type="date" name="dt_nasc" class="form-control">
              </div>
              Telefone:
              <div class="form-group">
                <input type="text" name="fone" class="form-control" onkeypress='mascTel(formulario.fone)' value="() -" onblur='ValidaTelefone(formulario.fone)' maxlength="14" >
              </div>
              Endereço:
              <div class="form-group">
                <input type="text" name="endereco" class="form-control" required>
              </div>
              CPF:
              <div class="form-group">
                <input type="text" name="cpf" class="form-control" onkeypress="mascCPF(formulario.cpf);" maxlength="14"  required>
              </div>
              RG:
              <div class="form-group">
                <input type="text" name="rg" class="form-control" onkeypress="mascCPF(formulario.rg);" maxlength="13"  required>
              </div>
              Escolaridade:
              <div class="form-group">
                <select name="escolaridade" class="form-control">
                  <option>Curso Técnico</option>
                  <option>Ensino Médio</option>
                  <option>Ensino Superior</option>
                </select>
              </div>
              Login:
              <div class="form-group">
                <input type="text" name="login" class="form-control"  required>
              </div>
              Senha:
              <div class="form-group">
                <input type="password" name="senha" class="form-control" required>
              </div>
              Função do Funcionario:
              <div class="form-group">
                <select name="perfil" class="form-control">
                  <option value="0">Garçom</option>
                  <option value="1">Gerente</option>
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
  <div class="row marketing" style=" border: 1px solid rgb(225, 232, 237); border-radius: 4px; ">
  <h4 class="text-center">Lista de Funcionarios Cadastrados</h4>

  <div class="col-lg-10">
    <table class="table" style="margin-top:10px;margin-left:55px;">
      <thead>
        <tr>
          <td style="font-weight:bold;">COD</td>
          <td style="font-weight:bold;">Nome</td>
          <td style="font-weight:bold;">Telefone</td>
          <td style="font-weight:bold;">Escolaridade</td>
          <td style="font-weight:bold;">Alterar</td>
          <td style="font-weight:bold;">Excluir</td>
          <td style="font-weight:bold;">Comissão</td>
        </tr>
      </thead>
      <?php 
        // $result = $pdo->query("SELECT * FROM tab_usuario where perfil = 0");
        // $produtos = $result->fetchAll();

        // if ($produtos) {
        //   foreach ($produtos as $row) {
      ?>
            <tbody>
              <td>
                <?php echo "<p></p>", @$row['codUsua'] ?>
              </td>
              <td>
                <?php echo "<p></p>", @$row['nome'] ?>
              </td>
              <td>
                <?php echo "<p></p>", @$row['fone'] ?>
              </td>
              <td>
                <?php echo "<p></p>", @$row['escolaridade'] ?>
              </td>
              <td>
                <input type="submit" value="Alterar" name="Submit" class='btn btn-sm btn-primary'>
              </td>
              <td>
                <input type="submit" value="Excluir" name="Submit" class='btn btn-sm btn-danger'>
              </td>
              <td class="td">
                <form action="calcula-comissao.php" method="post">
                  <input type="hidden" name="id" value="<?=$row['id']?>">
                  <input type="submit" value="Calcular" class="btn btn-sm btn-success">
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

    <!-- fim da classe container -->

<?php 
  $inc->includeParts("footer");
?>