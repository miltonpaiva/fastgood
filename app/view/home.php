<?php 
  $inc = new Controller();
  $inc->includeParts("header");

  $pdo = $inc->DB;
  
?>

<body>
<div class="container">

  <?php  $inc->includeParts("menu"); ?>

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
            <?php echo @$row['forCategoria'] ?>
          </td>
          <td>
            <?php echo @$row['nome'] ?>
          </td>
          <td class="img-circle">
            <img src="<?php $inc->includeImg($row['img']); ?>" class="img-thumbnail" style="width:70px;height:70px;">
          </td>
          <td>
            <?php echo "R$", @$row['valor'] ?>
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
