   <div class="w3-center w3-padding w3-animate-top" >
   
      <div class="w3-margin-top w3-container w3-card w3-light-grey">
        <div class=" w3-responsive">
      <form action="./usuario/solicitudcreargrupo" method="post" >
         <p><label class="w3-text-dark-grey w3-large">SOLICITAR CREACIÓN DE GRUPO:</label></p>
         
            <p>
               <select id ="sel"  name="proyecto" class="w3-select w3-border-black w3-leftbar">
                  <option value ="0" disabled selected class='w3-small w3-text-blue'>PROYECTOS</option>
                  <?php
                     foreach($this->proyecto->ListarOtro() as $r):

                          echo '<option value="'.$r->id_proyecto.'">'.$r->nombre.'</option>'; 

                          endforeach;
                  ?>
               </select>
               <select id ="sel"  name="docente" class="w3-select w3-border-black w3-leftbar">
                  <option value ="0" disabled selected class='w3-small w3-text-blue'>DOCENTES</option>
                  <?php
                     foreach($this->model->ListarDocentes() as $r):

                          echo '<option value="'.$r->did.'">'.$r->dnombre.' '.$r->dapellido.'</option>'; 

                          endforeach;
                  ?>
               </select>
            </p>
            <p>
               <button  type="submit" class="w3-button w3-black w3-text-white" name="submit" value=""><span>Registrar</span></button>
            </p>
         
      </form>
      </div>
      </div>
      <div class="w3-margin-top w3-container w3-card w3-light-grey">
      <form action="./grupo/eliminar" method="post" >
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
                 foreach($this->grupo->Listar() as $r):
                          
                        
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
                  foreach($this->grupo->ListarOtrosDos() as $r):
                        $i = 1;
                        echo '<tr>';
                        echo '<td>';
                        echo '';
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
                         $i++;  
                  endforeach;
              ?>
            </table>
         </div>
      </form>
      </div>
      <div class="w3-margin-top w3-margin-bottom w3-container w3-card w3-light-grey">
      <form action="./usuario/unirsegrupo" method="post" >
         <p><label class="w3-text-dark-grey w3-large">UNIRSE A OTRO GRUPO:</label></p>
         <input class="w3-border-black w3-leftbar w3-input" type="text" id="myInput" onkeyup="filtrar()" placeholder="Filtrar por nombre de proyecto"><br>
            
         <div class=" w3-responsive" style="max-height: 500px;">
            <table class=" w3-bordered w3-table" id="myTable">
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
                  foreach($this->grupo->ListarOtros() as $r):
                        echo '<tr>';
                        echo '<td class="w3-center">';
                        echo '<button class="w3-button" title="Añadir" type="submit" name="submit" value="'.$r->gidgrupo.'"><i class="fa fa-plus-circle fa-fw w3-text-green w3-large"></i></button>';
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