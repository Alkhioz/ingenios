   <div class="w3-center w3-padding w3-animate-top" >
   
      
      <div class="w3-margin-top w3-margin-bottom w3-container w3-card w3-light-grey">
      <form action="/grupo/eliminar" method="post" >
         <p><label class="w3-text-dark-grey w3-large">LISTA DE GRUPOS:</label></p>
           <input class="w3-border-black w3-leftbar w3-input" type="text" id="myInput2" onkeyup="filtrar2()" placeholder="Filtrar por nombre de proyecto"><br>
         <div class=" w3-responsive" style="max-height: 1500px;">
            <table class="w3-striped w3-bordered w3-table " id="myTable2">
               <thead class="w3-black">
                  <tr >
                    
                     <th>Nombre del proyecto</th>
                     <th>Objetivo del proyecto</th>
                     <th>Descripción del proyecto</th>
                     <th>Lider de Grupo</th>
                     <th>Docente Tutor</th>
                     <th>Otros Miembros</th>
                     <th>Fecha de registro</th>
                  </tr>
               </thead>
               <?php
                 foreach($this->grupo->ListarGruposAdmin() as $r):
                          
                        
                        echo '<tr>';
                        echo '<td style="max-width: 190px;">'.$r->pnombre.'</td>';
                        echo '<td style="max-width: 250px;">'.$r->pobjetivo.'</td>';
                        echo '<td style="max-width: 400px;">'.$r->pdescripcion.'</td>';
                        echo '<td style="max-width: 190px;">'.$r->unombre.' '.$r->uapellido.'</td>';
                        echo '<td style="max-width: 190px;"> '.$r->dnombre.' '.$r->dapellido.'</td>';
                        echo '<td style="max-width: 190px;">';
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