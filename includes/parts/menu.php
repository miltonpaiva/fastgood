<?php 

  global $project_name;
  global $project_path;

  $menu_classe = array();
  if (strpos($_SERVER['REQUEST_URI'], 'home')) {
    $menu_classe[0] = 'active';
  }elseif (strpos($_SERVER['REQUEST_URI'], 'conta')) {
    $menu_classe[1] = 'active';
  }elseif (strpos($_SERVER['REQUEST_URI'], 'produto')) {
    $menu_classe[2] = 'active';
  }elseif (strpos($_SERVER['REQUEST_URI'], 'usuarios')) {
    $menu_classe[3] = 'active';
  }
?>
<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      <li role="presentation" class="<?=@$menu_classe[0];?>"><a href="<?=$project_path;?>home">Home</a></li>
      <li role="presentation" class="<?=@$menu_classe[1];?>"><a href="<?=$project_path;?>contas">Contas</a></li>
      <li role="presentation" class="<?=@$menu_classe[2];?>"><a href="<?=$project_path;?>produtos">Produtos</a></li>
      <li role="presentation" class="<?=@$menu_classe[3];?>"><a href="<?=$project_path;?>usuarios">Usuarios</a></li>
    </ul>
  </nav>
  <h3 class="text-muted"><?=$project_name;?></h3>
</div>