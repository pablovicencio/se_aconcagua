<?php

require_once 'recursos/db/db.php';


class Funciones 
{





    /*///////////////////////////////////////
    Cargar Busqueda
    //////////////////////////////////////*/
        public function cargar_cat($com, $anu){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            
                                $sql = "select distinct * from (
select a.id_anuncio, a.nom_anuncio,a.cat_anuncio , ROUND((sum(b.nota_puntaje)/count(b.id_puntaje)), 0) puntaje
from anuncios a inner join puntaje b on a.id_anuncio = b.fk_anuncio where b.vig_puntaje = 1 and (a.nom_anuncio like :anu or a.desc_anuncio like :anu) and a.comuna_anuncio = :com and a.vig_anuncio = 1
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
union all
select a.id_anuncio, a.nom_anuncio,a.cat_anuncio , ROUND((sum(c.nota_puntaje)/count(c.id_puntaje)), 0) puntaje
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat inner join puntaje c on a.id_anuncio = c.fk_anuncio
where c.vig_puntaje = 1 and b.nom_cat like :anu and a.comuna_anuncio = :com and a.vig_anuncio = 1
group by a.id_anuncio, a.nom_anuncio,a.cat_anuncio ) a";
                           
        
            
            $anu = "%".$anu."%";   
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":anu", $anu, PDO::PARAM_STR);
                $stmt->bindParam(":com", $com, PDO::PARAM_INT);
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