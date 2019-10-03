<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/fastfood/includes/parts/header.php';
  if (isset($_GET['data'])) {
        $result = $pdo->query("SELECT * FROM tab_usuario where nome like '%" . $_GET['data'] . "%'");
        $usu = $result->fetchAll();
        echo "<pre>";
          print_r($usu);
        echo "</pre>";
  }
?>
<body>
  <div class="container">
   <?php include "menu.php" ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
      Adicionar Funcionario
    </button>
    <form action="busca.php">
      <input type="text" name="data">
      <input type="submit" value="envia">
    </form>

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
        $result = $pdo->query("SELECT * FROM tab_usuario where perfil = 0");
        $produtos = $result->fetchAll();

        if ($produtos) {
          foreach ($produtos as $row) {
      ?>
            <tbody>
              <td>
                <?php echo "<p></p>", $row['codUsua'] ?>
              </td>
              <td>
                <?php echo "<p></p>", $row['nome'] ?>
              </td>
              <td>
                <?php echo "<p></p>", $row['fone'] ?>
              </td>
              <td>
                <?php echo "<p></p>", $row['escolaridade'] ?>
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
          }
        }
      ?>
    </table>            
  </div>
</div>

    <!-- fim da classe container -->

<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/fastfood/includes/parts/footer.php';
?>
