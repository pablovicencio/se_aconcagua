<?php
require_once dirname( __DIR__ ) .'/recursos/db/db.php';


class Funciones 
{


    /*///////////////////////////////////////
    Chequear horario de atención
    //////////////////////////////////////*/


    function check_time($t1, $t2, $tn) {
        if ($t2 >= $t1) {
                return $t1 <= $tn && $tn < $t2;
            } else {
                return ! ($t2 <= $tn && $tn < $t1);
            }
        }


    /*///////////////////////////////////////
    Cargar Imagenes Anuncio
    //////////////////////////////////////*/
        public function cargar_imgs($anu){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            
                                $sql = "select img from img_anuncio where fk_id_anuncio = :anu";
                           
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }





    /*///////////////////////////////////////
    Cargar Anuncio
    //////////////////////////////////////*/
        public function cargar_anuncio($anu){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            
                                $sql = "select a.nom_anuncio,c.nom_comuna,a.dir_anuncio, a.desc_anuncio, CONCAT(IFNULL(a.fono1_anuncio, ''), ' - ', IFNULL(a.fono2_anuncio,'')) fono, 
ifnull(a.fb_anuncio,'0') fb,ifnull(a.ig_anuncio,'0') ig,ifnull(a.tw_anuncio,'0') tw,ifnull(a.ws_anuncio,'0') ws, a.hdesde_anuncio, a.hhasta_anuncio, a.maps_anuncio,
iFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje
 from anuncios a inner join comunas_cl c on a.comuna_anuncio = c.id_comuna where  a.id_anuncio = :anu and a.vig_anuncio = 1";
                           
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }







    /*///////////////////////////////////////
    Cargar Busqueda
    //////////////////////////////////////*/
        public function cargar_cat($com, $anu, $id){

            try{
                
                
                $pdo = AccesoDB::getCon();

               

                    $sql = "select distinct * from (
select a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) from puntaje b where a.id_anuncio = b.fk_anuncio and b.vig_puntaje = 1),0) puntaje
from anuncios a where  (a.nom_anuncio like :anu or a.desc_anuncio like :anu) and a.comuna_anuncio = :com and a.vig_anuncio = 1 and a.id_anuncio <> :id
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
union all
select a.id_anuncio, a.nom_anuncio,a.cat_anuncio , 
IFNULL((select ROUND((sum(c.nota_puntaje)/count(c.id_puntaje)), 0) from puntaje c where a.id_anuncio = c.fk_anuncio and c.vig_puntaje = 1),0) puntaje
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat 
where b.nom_cat like :anu and a.comuna_anuncio = :com and a.vig_anuncio = 1 and a.id_anuncio <> :id
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ) a";

                
                                
                           
        
            
            $anu = "%".$anu."%";   
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_STR);
                $stmt->bindParam(":com", $com, PDO::PARAM_INT);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }





    /*///////////////////////////////////////
    Cargar Comunas
    //////////////////////////////////////*/
        public function cargar_comunas($vig){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            if ($vig == 0) {
                                $sql = "select id_comuna, nom_comuna from comunas_cl";
                            
                            }else if ($vig == 1) {
                                $sql = "select id_comuna, nom_comuna from comunas_cl where vig_comuna = 1";
                            }
        
                       
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='index.php';</script>";
            }
        }
    }