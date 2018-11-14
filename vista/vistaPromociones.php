<?php 
if( isset($_GET['id']) ){
    //Si la sesión esta seteada no hace nada
    $id = $_GET['id'];
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

    function modal(id) {
    console.log(id);
    document.getElementById("titulo_promo").innerHTML = "";
    document.getElementById("img_promo").src = "";
    document.getElementById("img_qr").innerHTML = "";
    document.getElementById("desc_promo").innerHTML = "";
    document.getElementById("final_promo").innerHTML = "";

    
     $.ajax({
      url: '../controles/controlPromo.php',
      type: 'POST',
      data: {"id":id},
      dataType:'json',
      success:function(result){
         console.log('entra');
              document.getElementById("titulo_promo").innerHTML = result[0].nom_anuncio;
              document.getElementById("img_promo").src = result[0].img_promo;
              document.getElementById("img_qr").innerHTML = result[0].qr_promo;
              document.getElementById("desc_promo").innerHTML = result[0].desc_promo;
              document.getElementById("final_promo").innerHTML = result[0].duracion_promo;
              document.getElementById("mapa").innerHTML = result[0].maps_anuncio;

        console.log(result[0].nom_anuncio);
               },
                
              
              error: function(){
                      alert('Verifique los datos')      
              }
  })
   }
    </script>

      <style>

label {
  color: grey;
}


label:hover,
label:hover ~ label {
  color: orange;
}

.btn-primary:focus{color: white;}
  </style>

  </head>

  <body id="page-top">




    <nav class="navbar navbar-expand-sm bg-secondary fixed-top text-uppercase" id="mainNav">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../index.php" id="link-home-mob" name="link-home-mob"><i class="fa fa-home" aria-hidden="true"></i></a><a class="navbar-brand js-scroll-trigger" href="../index.php"  id="link-home" name="link-home">SE Aconcagua</a>
              <ul class="navbar-nav ml-auto" >  
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#anunciate" id="link-anu-mob" name="link-anu-mob"><i class="fa fa-space-shuttle" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto" id="link-anu" name="link-anu">Anunciate!</a>
                    </li>
              </ul>
  </nav>
  <div id="loading" style="display: none;">
    <center><img src="../img/load.gif"></center>
  </div>
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center" id="mainCont">
      <div class="container" id="container">
          <div class="row justify-content-center">

        <?php 
                                        $re = $fun->busca_promo();   
                                        foreach($re as $row)      
                                            {
                                               echo (
                                                      '  <div class="card" >
                                                              <img class="card-img-top" src="'.$row['img_promo'].'" alt="Card image">
                                                              <div class="card-body">
                                                                <h6 class="card-title">'.$row['nom_anuncio'].'</h6>
                                                                <div class="card-body">'.$row['desc_promo'].'</div>
                                                                <a class="btn btn-primary portfolio-item " href="#promocion-modal" onclick="modal('.$row['id_promo'].')" class="btn btn-primary">Ver Mas</a>
                                                              </div>
                                                            </div>
                                                            '
                                                );
                                            }   
                                        ?>     



        </div>

   

              
            
      </div>
    </header>

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



  <!-- Promocion Modal -->
  <div class="portfolio-modal mfp-hide" id="promocion-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="titulo_promo"  name="titulo_promo"></h4>
          <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
           <div class="row">
                <div class="col-8">
                  <img id="img_promo" class="rounded float-left img-fluid" src="" >
                </div>
                <div class="col-4">
                  <div id="img_qr" name="img_qr"></div>
                  <h6>Presenta este còdigo QR en el local para validar la promo</h6>
                </div>
           </div>
           <div class="row">
             <div class="col-12">
                <p id="desc_promo"></p>
                <label>Esta promo finaliza a las <span id="final_promo"  name="final_promo"></span></label>
                <h6>Encuentra esta promo en:<h6>
                    <div class="embed-responsive embed-responsive-16by9" id="mapa">
                    </div>
           </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                Volver</a>
        </div>
        
      </div>
    </div>
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