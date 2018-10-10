<?php 

chdir('../');
require_once 'clases/Funciones.php';


$fun = new Funciones();    
$comuna = stripcslashes ($_POST['comuna']);
$anuncio = stripcslashes ($_POST['anuncio']);

?>


      <?php   
              
              $re = $fun->cargar_cat($comuna, $anuncio);
              foreach($re as $row){
               $puntaje = '';

                  for ($i=1; $i <= 7 ; $i++) { 
                        if ($row['puntaje'] >= $i) {
                          $puntaje = $puntaje.'<label for="radio'.$i.'" style="color:orange;font-size: 2.5vw;">★</label>';
                        }else{
                          $puntaje = $puntaje.'<label for="radio'.$i.'" style="color:gray;font-size: 2.5vw;">★</label>';
                        }
                  }

                echo (
                        '  <div class="card" >
                                <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">'.$row['nom_anuncio'].'</h4>
                                  <a href="#" class="btn btn-primary">Ver Mas</a><br>
                                  '.$puntaje.'
                                </div>
                              </div>
                              '
                  );
              
              }
?>


