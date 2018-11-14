<?php

 if( isset($_GET['id_promo'])){
  		//Si la sesión esta seteada no hace nada
  		$id_promo = $_GET['id_promo'];
  	}
  	else{
 		echo"<script type=\"text/javascript\">alert('Error, datos de promo invalidos, comuniquese con el administrador'); window.location='http://seaconcagua.cl/';</script>"; 
 	}         
	     
 	require_once '../clases/clasePromo.php';

	try{
			$fec_uso = date("Y-m-d h:i:s", time());

			$dao = new PromoDAO($id_promo,$fec_uso);
 		
			$uso_promo = $dao->uso_promo();
			
			if (count($uso_promo)>0){
			echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador'); window.location='http://seaconcagua.cl/';</script>";     
			} else {
			
			echo"<script type=\"text/javascript\">alert('Promo Validad, gracias por pertenecer a SEAconcagua'); window.location='http://seaconcagua.cl/';</script>";   
				
					}
	} catch (Exception $e) {
		echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='http://seaconcagua.cl/';</script>"; 
	}
?>