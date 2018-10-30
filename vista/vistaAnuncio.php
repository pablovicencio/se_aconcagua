<?php 
if( isset($_GET['id']) ){
    //Si la sesión esta seteada no hace nada
    $id = $_GET['id'];
    $anu = $_GET['anu'];
    $com = $_GET['com'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: ../index.php");
  }   
   require_once dirname( __DIR__ ).'/clases/Funciones.php';
  

  $fun = new Funciones();   


?>
<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SE Aconcagua - Avisos publicitarios</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>




    <script type="text/javascript">
        $(document).ajaxStart(function() {
          $("#formbuscar").hide();
          $("#loading").show();
             }).ajaxStop(function() {
          $("#loading").hide();
          $("#formbuscar").show();
          });  

  $(document).ready(function() {
          $("#formevaluar").submit(function() {    
            $.ajax({
              type: "POST",
              url: '../controles/controlEvaluar.php',
              data:$("#formevaluar").serialize()+"&id_anu=<?php echo $id;?>",
              success: function (result) { 
              var msg = result.trim();

                switch(msg) {
                        case '0':
                            swal("Error", "Verifique los datos de su evaluación", "warning");
                            break;
                        case '1':
                            swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                            break;
                        default:
                            swal("Evaluación Ingresada", msg, "success",{
                                  buttons: false,
                                  timer: 3000,
                                });
                            setTimeout('document.location.reload(true)',3000);

                    }



              },
              error: function(){
                      alert('Verifique los datos')      
              }
            });
            return false;
          });
        });    
    </script>

      <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  #anuncio{text-align: left!important; 
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 0px solid #000000;
            color: black;}
   #puntos {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

#puntos p {
  text-align: center;
}

#puntos label {
  font-size: 20px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
  </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">SE Aconcagua</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos">Sugeridos</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto">Anunciate!</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <div id="loading" style="display: none;">
    <center><img src="img/load.gif"></center>
  </div>
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center" id="mainCont">
      <div class="container" id="container">
          <div class="row">

        <?php 
                                        $re = $fun->cargar_anuncio($id);   
                                        foreach($re as $row)      
                                            {
                                               
                                            }   
                                            echo '<h2 class=" text-uppercase">'.$row['nom_anuncio'].'</h2><br>';
                                        ?>     



        </div>
          <div class="row" id="anuncio" name="anuncio">
          <div class="col-8">
             
                

                  <div id="img" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                    <?php 
                                        $i=1;
                                        $re1 = $fun->cargar_imgs($id);   
                                        foreach($re1 as $row1) { 
                                          
                                              if ($i==1) {
                                                $img=' active';
                                              }else
                                              {$img='';}
                                               echo '<div class="carousel-item'.$img.'">
                        <img src="'.$row1['img'].'" alt="'.$row['nom_anuncio'].'" width="1100" height="500">
                      </div>';
                                          $i++;

                                            }  
              
                                        ?>   
                    </div>
                    
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#img" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#img" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  </div><br>
                <form class="puntos" name="formevaluar" id="formevaluar">
                  <p class="clasificacion">
                    <input type="submit" class="btn btn-primary" id="btnAc" name="btnAc" value="Evaluar">
                       <input id="radio1" type="radio" name="estrellas" value="7"><!--
                    --><label for="radio1" style="font-size: 2.5vw";>★</label><!--
                    --><input id="radio2" type="radio" name="estrellas" value="6"><!--
                    --><label for="radio2" style="font-size: 2.5vw";>★</label><!--
                    --><input id="radio3" type="radio" name="estrellas" value="5"><!--
                    --><label for="radio3" style="font-size: 2.5vw";>★</label><!--
                    --><input id="radio4"  type="radio" name="estrellas" value="4"><!--
                    --><label for="radio4" style="font-size: 2.5vw">★</label><!--
                    --><input id="radio5" type="radio" name="estrellas" value="3"><!--
                    --><label for="radio5" style="font-size: 2.5vw">★</label><!--
                    --><input id="radio6" type="radio" name="estrellas" value="2"><!--
                    --><label for="radio6" style="font-size: 2.5vw">★</label><!--
                    --><input id="radio7" type="radio" name="estrellas" value="1"><!--
                    --><label for="radio7" style="font-size: 2.5vw">★</label>

                  </p>

                </form>

                  <br>

                  <h4><span class="badge badge-light">Encuentralo en:</span><h4>
                    <div class="embed-responsive embed-responsive-16by9">
                    <?php
                      
                         echo $row['maps_anuncio'];
                        
                    ?>  
                  </div>
                </div>
            <div class="col-4">


<?php
//$hdesde = date( 'H:i', strtotime( $row['hdesde_anuncio'] )); 
//$hhasta = date( 'H:i', strtotime( $row['hhasta_anuncio'] )); 

$t1 =  date('His', strtotime($row['hdesde_anuncio'])) ;
$t2 =  date('His', strtotime($row['hhasta_anuncio']));
$tn = date('His');


$valida = $fun->check_time($t1, $t2, $tn) ? "si" : "no";



    if ($valida == 'si') {
      echo('<span class="font-weight-bold text-success">Disponible <img src="../img/check.gif" alt="Disponible" height="32" width="32"></span><br><br>');
    }else{
      echo('<span class="font-weight-bold text-danger">No Disponible <img src="../img/cancel.gif" alt="Disponible" height="32" width="32"></span><br><br>');
    }






?>



                  <div class="form-group">

                    <span class="font-weight-bold"><?php echo $row['nom_comuna']; ?></span><br>
                    <span class="font-weight-bold"><?php echo $row['dir_anuncio']; ?></span><br><br>
                    <span ><?php echo $row['desc_anuncio']; ?></span><br><br>
                    <span >Telefonos: <?php echo $row['fono']; ?></span><br><br>



                    <?php
                      if ($row['fb'] <> '0') {
                         echo '<a  href="'.$row['fb'].'" target="blank">
                  <i class="fa fa-facebook-official" style="font-size:32px" ></i>
                </a>';
                       } 
                    ?>  
                    <?php
                      if ($row['ig'] <> '0') {
                         echo '<a  href="'.$row['ig'].'" target="blank">
                  <i class="fa fa-instagram" style="font-size:32px" ></i>
                </a>';
                      } 
                    ?>  
                    <?php
                      if ($row['tw'] <> '0') {
                         echo '<a  href="'.$row['tw'].'" target="blank">
                  <i class="fa fa-twitter" style="font-size:32px" ></i>
                </a>';
                       } 
                    ?>  
                    <?php
                      if ($row['ws'] <> '0') {
                         echo '<a  href="'.$row['ws'].'" target="blank">
                  <i class="fa fa-desktop" style="font-size:32px" ></i>
                </a><br>';
                       } 
                    ?> 

                    <span class="badge badge-success"><label for="nota" style="color:white;font-size: 1.5vw;">★</label> <?php echo $row['puntaje']; ?></span><br>


                    






                  </div>

                <div class="form-group">


                </div>
            </div>

        </div>
   

              
            
      </div>
    </header>
<section class="bg-primary text-white mb-0" id="conocenos">

<h3 class="text-center text-uppercase text-white">También te puede interesar</h3>


<center>
         <?php   
              
              $re3 = $fun->cargar_cat($com, $anu, $id);
              foreach($re3 as $row3){
               $puntaje = '';

                  for ($i=1; $i <= 7 ; $i++) { 
                        if ($row3['puntaje'] >= $i) {
                          $puntaje = $puntaje.'<label for="radio'.$i.'" style="color:orange;font-size: 2.5vw;">★</label>';
                        }else{
                          $puntaje = $puntaje.'<label for="radio'.$i.'" style="color:gray;font-size: 2.5vw;">★</label>';
                        }
                  }

                echo (
                        '  <div class="card" >
                                <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                                <div class="card-body">
                                  <h4 class="card-title">'.$row3['nom_anuncio'].'</h4>
                                  <a href="vistaAnuncio.php?id='.$row3['id_anuncio'].'&anu='.$anu.'&com='.$com.'" class="btn btn-primary">Ver Mas</a><br>
                                  '.$puntaje.'
                                </div>
                              </div>
                              '
                  );
              
              }
              ?>

    </center>
  </section>

    <!-- Contact Section -->
    <section id="contacto">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Anunciate con nosotros!</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nombre</label>
                  <input class="form-control" id="name" type="text" placeholder="Nombre" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email</label>
                  <input class="form-control" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefono</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Telefono" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Mensaje</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Mensaje" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


       <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Dirección</h4>
            <p class="lead mb-0">Calle La Unión # 474
              <br>San Esteban, Los Andes</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Visitanos</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4">SE Aconcagua</h4>
            <p class="lead mb-0">Esta plataforma digital esta a cargo de 
              <a href="http://www.andescode.cl" target="_blank">Andescode</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; SE Aconcagua 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.min.js"></script>

  </body>

</html>