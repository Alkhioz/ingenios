<div class="w3-center w3-padding w3-animate-top" >
      <div class= 'w3-margin-top w3-container w3-card w3-light-grey w3-margin-bottom'>
         <p><label class="w3-text-dark-grey w3-large">REGISTRO DE PROYECTOS:</label></p>
         <div class=" w3-responsive" style="max-height: 600px;">
            <table class="w3-striped w3-bordered w3-table">
               <thead class="w3-black">
                  <tr >
                     <th> </th>
                     <th>Nombre</th>
                     <th>Fecha registro</th>
                     <th>Objetivo</th>
                     <th>Descripcion</th>
                  </tr>
               </thead>
               <tr>
                  <form   action='/proyecto/agregar' method='post'>
                     <td class="w3-center">
                        <button class="w3-button" title="Guardar" type="submit" name="submit" value=""><i class="fa fa-plus-circle fa-fw w3-text-green w3-large"></i></button>
                     </td>
                     <td><input class="w3-input" type="text" placeholder="Nombre de Proyecto"  name="Nombre" value="" required /></td>
                     <td><input class="w3-input" type="text" placeholder="Fecha de registro"  name="Fecha" value=" <?php echo date('Y-m-d',time()); ?> " disabled /></td>
                     <td><input class="w3-input" type="text" placeholder="Objetivo"  name="Objetivo" value="" required /></td>
                     <td><input class="w3-input" type="text" placeholder="Descripcion"  name="Descripcion" value="" required /></td>
               </form>
               </tr>
               <?php
                        foreach($this->proyecto->Listar() as $r):
                          echo '<tr>';
                          echo '<td class="w3-center">';
                          echo '<form   action="/proyecto/eliminar" method="post"><button class="w3-button" title="Eliminar" type="submit" name="submit" value="'.$r->id_proyecto.'"><i class="fa fa-minus-circle fa-fw w3-text-red w3-large"></i></button></form>';
                          echo '</td>';
                          echo '<td>'.$r->nombre.'</td>';
                          echo '<td>'.$r->fecha_registro.'</td>';
                          echo '<td>'.$r->objetivos.'</td>';
                          echo '<td>'.$r->descripcion.'</td>';
                          echo '</tr>';
                           

                          endforeach;
                  ?>
               
            </table>
         </div>
      </div>
   </div>