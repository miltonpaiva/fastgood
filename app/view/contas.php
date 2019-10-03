<?php 
  $inc = new Controller();
  $inc->includeParts("header");

  $pdo = $inc->DB;
  
?>

<body>
<div class="container">
  <?php  $inc->includeParts("menu"); ?>

  <!-- Button trigger modal -->
  <a href="add_conta.php">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
      Registrar Nova Conta
    </button>
  </a>


  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    switch ($msg) {
      case 1:
  ?>
        <div class="alert alert-success" role="alert" style="height:relative;width:690px;left:325px;margin-top:10px;text-align:center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          Mesa Adicionada com sucesso!
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
        Mesa alterada com sucesso!
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
          Mesa excluida com sucesso!
        </div>
  <?php
      }
    }
  ?> 

<div class="row marketing" style=" border: 1px solid rgb(225, 232, 237); border-radius: 4px; ">
  <h4 class="text-center">Lista de Contas Cadastradas</h4>

  <div class="col-lg-10">

    <table class="table" style="margin-top:10px;margin-left:55px;">
        <thead>
          <tr>
            <td style="font-weight:bold;">Status</td>
            <td style="font-weight:bold;">COD</td>
            <td style="font-weight:bold;">Mesa</td>
            <td style="font-weight:bold;">Data de Abertura</td>
            <td style="font-weight:bold;">Valor</td>
            <td style="font-weight:bold;">Alterar</td>
            <td style="font-weight:bold;">Excluir</td>
    		    <td style="font-weight:bold;">imprimir</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $result = $pdo->query("SELECT * FROM tab_conta ORDER BY dtAbertura desc");
          $contas = $result->fetchAll();
          if ($contas) {
            foreach ($contas as $row) {
              if ($row['status']) {$status = 'Aberta';$classe = 'success';}else{$status = 'Encerrada';$classe = 'danger';}
        ?>
          
              <tr class="<?=$classe;?>">
                <td>
                  <?php echo "<p>{$status}</p>"; ?>
                </td>
                <td>
                  <?php echo "<p>{$row['forGarcom']}</p>"; ?>
                </td>
                <td>
                  <?php echo "<p>{$row['forMesa']}</p>"; ?>
                </td>
                <td>
                  <?php echo "<p>{$row['dtAbertura']}</p>"; ?>
                </td>
                <td>
                  <?php echo "<p>R$".$row['valorTotal']."</p>"; ?>
                </td>
                <td>
                  <form action="alterar_conta.php?id_conta=<?php echo $row['id_conta'];?>" method="POST">
                    <input type="submit" value="Alterar" name="Submit" class='btn btn-sm btn-primary'>
                  </form>
                </td>
                <td>
                  <form action="includes/functions/excluir_conta.php?id_conta=<?php echo $row['id_conta']; ?>" method="POST">
              	<input type="submit" value="Excluir" name="Submit" class='btn btn-sm btn-danger'> 
                  </form>
                </td>
                <td>
                  <form action="imprimir.php?id_conta=<?php echo $row['id_conta']; ?>" method="POST">
                   <input type="submit" value="Sim" name="Submit" class='btn btn-sm btn-danger'> 
                  </form>
              	
                </td>
              </tr>
        <?php 
            }
          }
        ?>
      </tbody>
    </table>

  </div>
</div>

  <!-- fim da classe container -->
<?php 
  $inc->includeParts("footer");
?>
