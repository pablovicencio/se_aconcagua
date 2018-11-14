<?php
require_once '../recursos/db/db.php';
   

/*/////////////////////////////
Clase Promo
////////////////////////////*/

class PromoDAO 
{
    private $id_promo;
    private $fec_uso;

    public function __construct($id_promo=null,
                                $fec_uso=null
                                ) {



    $this->id_promo = $id_promo;
    $this->fec_uso = $fec_uso;
    
    }

    public function getPromo() {
    return $this->id_promo;
    }

    /*///////////////////////////////////////
    Guardar Uso Promo
    //////////////////////////////////////*/
    public function uso_promo() {

    			 try{
             
                $pdo = AccesoDB::getCon();

                $sql_uso_promo = " INSERT INTO `uso_promo`
                                    (
                                    `fec_uso_promo`,
                                    `fk_id_promo`)
                                    VALUES
                                    (:fec,
                                     :id)";


                $stmt = $pdo->prepare($sql_uso_promo);
                
                $stmt->bindParam(":id", $this->id_promo, PDO::PARAM_INT);
                $stmt->bindParam(":fec", $this->fec_uso, PDO::PARAM_STR);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='http://seaconcagua.cl/';</script>"; 
            }

    }

}