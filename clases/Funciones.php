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
select id_anuncio, nom_anuncio,cat_anuncio 
from anuncios where (nom_anuncio like :anu or desc_anuncio like :anu) and comuna_anuncio = :com and vig_anuncio = 1
union all
select a.id_anuncio, a.nom_anuncio,a.cat_anuncio 
from anuncios a inner join cat_anuncio b on a.cat_anuncio = b.id_cat 
where b.nom_cat like :anu and a.comuna_anuncio = :com and a.vig_anuncio = 1) a";
                           
        
            
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