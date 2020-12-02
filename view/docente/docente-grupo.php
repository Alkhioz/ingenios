   <div class="w3-center w3-padding w3-animate-top" >
   
      
      <div class="w3-margin-top w3-margin-bottom w3-container w3-card w3-light-grey">
      <form action="/grupo/eliminar" method="post" >
         <p><label class="w3-text-dark-grey w3-large">MIS GRUPOS:</label></p>
         <div class=" w3-responsive" style="max-height: 500px;">
            <table class="w3-striped w3-bordered w3-table">
               <thead class="w3-black">
                  <tr >
                     <th> </th>
                     <th>Nombre proyecto</th>
                     <th>Lider de Grupo</th>
                     <th>Docente Tutor</th>
                     <th>Otros Miembros</th>
                     <th>Fecha de registro</th>
                  </tr>
               </thead>
               <?php
                 foreach($this->grupo->ListarGruposDocente() as $r):
                          
                        
                        echo '<tr>';
                        echo '<td>';
                        echo '<button class="w3-button" title="Eliminar" type="submit" name="submit" value="'.$r->gidproyecto.'"><i class="fa fa-minus-circle fa-fw w3-text-red w3-large"></i></button>';
                        echo '</td>';
                        echo '<td>'.$r->pnombre.'</td>';
                        echo '<td>'.$r->unombre.' '.$r->uapellido.'</td>';
                        echo '<td>'.$r->dnombre.' '.$r->dapellido.'</td>';
                        echo '<td>';
                        echo '<table class=" w3-bordered w3-table">';
                        foreach($this->grupo->GetMiembros($r->mgidgrupo) as $s):
                            echo '<tr><td>'.$s->unombre.' '.$s->uapellido.'<br>'.$s->ufregistro.'</td></tr>';      
                         endforeach;
                        echo '</table>';
                         echo '</td>';
                         echo '<td>'.$r->gfregistro.'</td>';
                         echo '</tr>';  
                  endforeach;
              ?>
            </table>
         </div>
      </form>
      </div>
      
   </div>