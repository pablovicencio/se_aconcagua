<?php
require_once '../recursos/db/db.php';
   

/*/////////////////////////////
Clase Anuncio
////////////////////////////*/

class AnuncioDAO 
{
    private $id_anu;
    private $nota;

    public function __construct($id_anu=null,
                                $nota=null
                                ) {



    $this->id_anu = $id_anu;
    $this->nota = $nota;
    
    }

    public function getAnu() {
    return $this->id_anu;
    }

    /*///////////////////////////////////////
    Ingresar Evaluacion
    //////////////////////////////////////*/
    public function ing_eva() {

    			 try{
             
                $pdo = AccesoDB::getCon();

                $sql_ing_eva = " INSERT INTO `puntaje`
                                    (
                                    `nota_puntaje`,
                                    `vig_puntaje`,
                                    `fk_anuncio`)
                                    VALUES
                                    (
                                    :nota,
                                    1,
                                    :id_anu)";


                $stmt = $pdo->prepare($sql_ing_eva);
                
                $stmt->bindParam(":nota", $this->nota, PDO::PARAM_INT);
                $stmt->bindParam(":id_anu", $this->id_anu, PDO::PARAM_INT);
                $stmt->execute();
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
            }

    }

}