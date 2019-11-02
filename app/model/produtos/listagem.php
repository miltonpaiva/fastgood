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

         $sql = "
                  SELECT
                    tab_produtos.codProd,
                    tab_produtos.nome,
                    tab_produtos.valor,
                    tab_categorias.nome as catNome
                  FROM
                    tab_produtos
                  inner join
                    tab_categorias
                    on  tab_produtos.forCategoria =
                        tab_categorias.codCat
                  ORDER BY valor DESC";

         $result = $pdo->query($sql);
         $produtos = $result->fetchAll();

         if ($produtos):
           foreach ($produtos as $produto):
       ?>
           <tbody>
             <td>
               <?php echo "<p></p>", @$produto['codProd'] ?>
             </td>
             <td>
               <?php echo "<p></p>", @$produto['nome'] ?>
             </td>
             <td>
               <?php echo "<p></p>R$", @$produto['valor'] ?>
             </td>
             <td>
               <?php echo "<p></p>", @$produto['catNome'] ?>
             </td>
             <td>
               <form action="alterar_produto.php?pro_id=<?php echo $produto['pro_id'];?>" method="POST">
                 <input type="submit" value="Alterar" name="Submit" class='btn btn-sm btn-primary'>
               </form>
             </td>
             <td>
               <form action="includes/functions/excluir_produtos.php?pro_id=<?php echo $produto['pro_id']; ?>" method="POST">
                 <input type="submit" value="Excluir" name="Submit" class='btn btn-sm btn-danger'>
               </form>
             </td>
           </tbody>
       <?php
            endforeach;
          endif;
       ?>
     </table>
