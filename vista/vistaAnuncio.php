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
          $("#formbuscar").submit(function() {    
            $.ajax({
              type: "POST",
              url: 'vista/vistaBuscar.php',
              data:$("#formbuscar").serialize(),
              success: function (result) { 
              console.log('entra');
              document.getElementById("container").innerHTML = result;
                
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
  </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">SE Aconcagua</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#comunidad">Comunidad SE</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos">Conocenos</a>
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
                                            echo '<h3>'.$row['nom_anuncio'].'</h3><br>';
                                        ?>     



        </div>
          <div class="row">
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
                  </div><br><br>

                  <h4><span class="badge badge-light">Encuentralo en:</span><h4>
                    <?php
                      
                         echo $row['maps_anuncio'];
                        
                    ?>  

                </div>
            <div class="col-4">

<?php
$hdesde = strtotime( $row['hdesde_anuncio'] ); $hhasta = strtotime( $row['hhasta_anuncio'] ); 


$hora_compara =  date('H'); 


if($hdesde<=$hora_compara && $hora_compara<=$hhasta){ 
      echo "La hora está en el horario 1"; 
      return; 
    }   

else 
    echo "La hora no está en ningún horario"; 
?>



                  <div class="form-group">

                    <h4><span class="badge badge-light"><?php echo $row['comuna_anuncio']; ?></span><h4>
                    <h4><span class="badge badge-light"><?php echo $row['dir_anuncio']; ?></span><h4>
                    <h4><span class="badge badge-light"><?php echo $row['desc_anuncio']; ?></span><h4>
                    <h4><span class="badge badge-light">Telefonos de contacto: <?php echo $row['fono']; ?></span><h4>



                    <?php
                      if ($row['fb'] <> '0') {
                         echo '<h4><span class="badge badge-light">'.$row['fb'].'</span><h4>';
                       } 
                    ?>  
                    <?php
                      if ($row['ig'] <> '0') {
                         echo '<h4><span class="badge badge-light">'.$row['ig'].'</span><h4>';
                       } 
                    ?>  
                    <?php
                      if ($row['tw'] <> '0') {
                         echo '<h4><span class="badge badge-light">'.$row['tw'].'</span><h4>';
                       } 
                    ?>  
                    <?php
                      if ($row['ws'] <> '0') {
                         echo '<h4><span class="badge badge-light">'.$row['ws'].'</span><h4>';
                       } 
                    ?>  

                    






                  </div>

                <div class="form-group">

                    
                </div>
            </div>

        </div>
   

              
            
      </div>
    </header>

<h4><span class="badge badge-light">También te puede interesar</span><h4>


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
                                  <a href="vista/vistaAnuncio.php?anun='.$row3['id_anuncio'].'" class="btn btn-primary">Ver Mas</a><br>
                                  '.$puntaje.'
                                </div>
                              </div>
                              '
                  );
              
              }
              ?>

    </center>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Location</h4>
            <p class="lead mb-0">2215 John Daniel Drive
              <br>Clark, MO 65243</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Around the Web</h4>
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
            <h4 class="text-uppercase mb-4">About Freelancer</h4>
            <p class="lead mb-0">Freelance is a free to use, open source Bootstrap theme created by
              <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
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