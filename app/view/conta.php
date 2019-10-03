<?php 
  $inc = new Controller();
  $inc->includeParts("header");
?>

<style type="text/css">
  .del{
    margin-left: 10px;
    padding: 0px 5px;
  }
</style>
<body>
  <div class="container">
  <?php  $inc->includeParts("menu"); ?>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    adicionar pedido
  </button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#333;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Pedidos</h4>
        </div>
        <div class="modal-body">

    			<table class="table" style="margin-top:10px;">
            <thead>
              <tr>
                <td style="font-weight:bold;">Nome</td>
                <td style="font-weight:bold;">Valor</td>
                <td style="font-weight:bold;">Categoria</td>
                <td style="font-weight:bold;">Adicionar</td>
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
                        <?php echo "<p>{$row['nome']}</p>"; ?>
                      </td>
                      <td>
                        <?php echo "<p>R$".$row['valor']."</p>"; ?>
                      </td>
                      <td>
                        <?php echo "<p>{$row['forCategoria']}</p>"; ?>
                      </td>
                      <td>                        
                          <input type="button" id="<?=$row['nome'].';'.$row['valor'] ?>" value="Sim" name="add_prod" class='btn btn-sm btn-primary'onclick='add_prod(this.id)' >
                      </td>
                    </tbody>
              <?php 
                  endforeach;
                endif;
              ?>
          </table>
      
        </div>
      </div>
    </div>
  </div>
  <form action="includes/processadados.php?go=cadastrarc" method="post" class="form-group">
    Status:
    <div class="form-group">
      <input readonly="true" type="text" class="form-control"  name="status" value="Ativa"/>
    </div>
    Funcionario:
    <div class="form-group">
      <select name="codGarcom" class="form-control"  required>
        <?php
          $result = $pdo->query("SELECT * FROM tab_usuario WHERE perfil = 0");
          $funcionario = $result->fetchAll();
          foreach ($funcionario as $row):
        ?>
            <option value="<?php echo $row['codUsua']?>"><?php echo $row['nome']?></option>
        <?php 
          endforeach;
        ?>
      </select>
    </div>
    Pedido:
    <div class="form-group">
      <table id="list-pedidos" class="table">
      </table>
    </div>
    Mesa:
    <div class="form-group">
      <select name="mesa" class="form-control" >
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    Valor Total:
    <div class="form-group">
      <b>R$<input type="number" id="total" name="valor" value="0.0"></b>
    </div>
  </form>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-success">Finalizar</button>
  </div>
  <script type="text/javascript">
    function add_prod(data) {
      var data_formated = data.split(";");
      var li = document.createElement('tr');

      li.innerHTML = '<td>R$'+data_formated[1]+' - <b>'+data_formated[0]+'</b></td><td><button id="'+data_formated[1]+'" type="button" class="btn btn-danger del" onclick="del(this,this.id)">X</button></td>';
      document.getElementById('list-pedidos').appendChild(li);

      calc_total(parseFloat(data_formated[1]),'add');
    }
    function calc_total(val,type){
      if (type == 'add') {
        var valor = document.getElementById('total');
        var valor_atual = parseFloat(valor.value);
        var calculado = valor_atual += val;
        valor.value = calculado.toFixed(2);
      }else{
        var valor = document.getElementById('total');
        var valor_atual = parseFloat(valor.value);
        var calculado = valor_atual -= val;
        valor.value = calculado.toFixed(2);
      }
    }
    function del(dom,val) {
      var td = dom.parentNode;
      td.parentNode.style = 'display:none';
      calc_total(val,'del');
    }
  </script>
  <!-- fim da classe container -->

<?php 
  $inc->includeParts("footer");
?>
