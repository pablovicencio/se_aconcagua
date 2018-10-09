<?php 

chdir('../');
require_once 'clases/Funciones.php';


$fun = new Funciones();    
$comuna = stripcslashes ($_POST['comuna']);
$anuncio = stripcslashes ($_POST['anuncio']);

?>
<!DOCTYPE html>
<html lang="es">


  <body>

      <?php
              $re = $fun->cargar_cat($comuna, $anuncio);
              foreach($re as $row){
                echo (
                        '  <div class="card" >
                                <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">'.$row['nom_anuncio'].'</h4>
                                  <a href="#" class="btn btn-primary">Ver Mas</a>
                                </div>
                              </div>
                              '
                  );
              
              }
?>




</body>
</html>