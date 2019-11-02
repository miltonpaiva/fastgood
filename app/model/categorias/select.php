	<select name="categoria" class="form-control" >
		<option selected>Categoria</option>
       <?php

         global $pdo;
         $sql = "
                  SELECT
					*
				  FROM
                    tab_categorias
                  ORDER BY nome DESC";

         $result = $pdo->query($sql);
         $categorias = $result->fetchAll();

         if ($categorias):
           foreach ($categorias as $categoria):
       ?>
			<option id="<?=$categoria['codCat'];?>">
				<?=$categoria['nome'];?>
			</option>
       <?php
            endforeach;
          endif;
       ?>
	</select>
