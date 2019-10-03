<?php 
  $inc = new Controller();
  $inc->includeParts("header");

  $pdo = $inc->DB;
  
?>

<body>
<div class="container">

  <?php  $inc->includeParts("menu"); ?>
  <?php
    if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
      switch ($msg) {
        case 2:
  ?>
          <div class="alert alert-success" role="alert" style="height:relative;width:690px;left: 325px;margin-top:-5px;text-align:center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            Você foi autenticado com sucesso!
          </div>
  <?php
      }
    }
  ?> 

  <div class="row marketing" style="border: 1px solid rgb(225, 232, 237); border-radius: 4px; ">
    <div class="col-lg-10">
    <h4>O que você irá comer?</h4>

    <table class="table" style="margin-top:10px;margin-left:55px;">
      <thead>
        <tr> 
          <td style="font-weight:bold;">Categoria</td>
          <td style="font-weight:bold;">Nome</td>
          <td style="font-weight:bold;">Foto</td>
          <td style="font-weight:bold;">Valor</td>
        </tr>
      </thead>
      <?php 

        $result = $pdo->query("SELECT * FROM tab_produtos ORDER BY valor DESC");
        $produtos = $result->fetchAll();

        if ($produtos):
          foreach ($produtos as $row):
      ?>
        <tbody>
          <td>
            <?php echo "<p></p>", @$row['forCategoria'] ?>
          </td>
          <td>
            <?php echo "<p></p>", @$row['nome'] ?>
          </td>
          <td class="img-circle">
            <img src="<?php echo @$row['img'] ?>" class="img-thumbnail" style="width:70px;height:70px;">
          </td>
          <td>
            <?php echo "<p></p>R$", @$row['valor'] ?>
          </td>
        </tbody>
        <?php 
            endforeach;
        endif;
      ?>
    </table>

    </div>
  </div>

<?php 
  $inc->includeParts("footer");
?>
