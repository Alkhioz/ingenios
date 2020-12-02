<script src="../js/tiny/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
<div class="w3-center w3-container w3-animate-top" >
    <div class= 'w3-padding w3-content' style="max-width: 600px;">
        <div class="w3-card w3-mobile w3-margin-top w3-light-grey">
            <div class=" w3-center w3-padding">
                <form action='/administrador/crearnoticia' method='post'>
                    <p><label>Noticia:</label><br />
                    <textarea name='noticia' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['noticia'];}?></textarea></p>
                    <p><button  type="submit" class="w3-button w3-black" name="submit" value="Login"><span>Guardar</span></button></p>
                </form>
                <?php
                        /*  foreach($this->model->ListarNoticias() as $r):
                                echo '<div class="w3-margin">'; 
                                echo $r->contenido; 
                                echo '</div>';
                                endforeach;*/
                ?>

            </div>
        </div>
    </div>
</div>