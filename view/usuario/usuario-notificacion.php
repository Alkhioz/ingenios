<div class="w3-center w3-container w3-animate-top" >
     <div class= 'w3-padding w3-content w3-margin-top w3-margin-bottom w3-card w3-light-grey' style="max-width: 650px;">
      <p><label class="w3-text-dark-grey w3-large">NOTIFICACIONES:</label></p>
         
<?php
                        foreach($this->model->ListarSolicitudes() as $r):
                           echo '<div class="w3-margin-bottom w3-border-black w3-leftbar w3-card w3-mobile  w3-white">
                           <div class=" w3-center w3-padding w3-responsive">
                           <table class="w3-table">
                           <tr>
                           <td>';
                           echo '<img src="/img/'.$r->ufoto.'" alt="Avatar" class="w3-circle" style="width:35px"></td>';
                           echo '<td><label class="w3-justify"><b>'.$r->unombre.' '.$r->uapellido.'</b> desea formar parte del proyecto: <b><i>'.$r->pnombre.'</i></b>.</label></td>';      
                           echo '<td><form action="/usuario/aceptaruniongrupo" method="post" enctype="multipart/form-data" >
                           <button class="w3-button" title="Aceptar" type="submit" name="submit" value="'.$r->gid.'"><i class="fa fa-plus-circle fa-fw w3-text-green w3-large"></i></button></form></td>';
                           echo '<td><form action="/usuario/rechazaruniongrupo" method="post" enctype="multipart/form-data" >
                           <button class="w3-button" title="Cancelar" type="submit" name="submit" value="'.$r->id.'"><i class="fa fa-minus-circle fa-fw w3-text-red w3-large"></i></button></form></td>';
                           echo '</tr></table></div></div>';
                        endforeach;
                  ?>
</div>
</div>