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
         global $pdo;
         $result = $pdo->query("SELECT * FROM tab_produtos ORDER BY valor DESC");
         $produtos = $result->fetchAll();

         if ($produtos) {
           foreach ($produtos as $row) {
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
           }
         }
       ?>
     </table>
