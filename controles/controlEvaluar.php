<?php

 if( isset($_POST['estrellas']) and isset($_POST['id_anu']) ){
  		//Si la sesión esta seteada no hace nada
  		$id_anu = $_POST['id_anu'];
  		$nota = $_POST['estrellas'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("0");
 		goto salir;
 	}         
	     
 	require_once '../clases/claseAnuncio.php';

	try{
			

			$dao = new AnuncioDAO($id_anu,$nota);
 		
			$eva_anu = $dao->ing_eva();
			
			if (count($eva_anu)>0){
			echo "1";    
			} else {
			
			echo"Evaluaste con nota: ".$nota.", gracias por apoyar nuestra comunidad";  
				
					}
	salir:
	} catch (Exception $e) {
		echo"1"; 
	}
?>