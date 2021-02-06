<?php

require_once 'Conexion.php';
require_once 'entities/Valoracion.php';

class ValoracionController{


    public function findByID($id){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from valoracion WHERE id=?");
            $result->execute([$id]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $valoracion = new Valoracion($reg->id, $reg->id_usu, $reg->id_obra, $reg->point, $reg->texto);

                return $valoracion;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }


    
    public static function findById_obra($obra){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from valoracion WHERE id_obra=?");
            $result->execute([$obra->id]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $valoracion = new Valoracion($reg->id, $reg->id_usu, $reg->id_obra, $reg->point, $reg->texto);

                return $valoracion;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }

    }

    public static function findAllValoracionesByObra($obra){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from valoracion WHERE id_obra=?");
            $result->execute([$obra->id]);

            if ($result->rowCount()) {

                while($reg = $result->fetchObject()){
                    $valoracion = new Valoracion($reg->id, $reg->id_usu, $reg->id_obra, $reg->point, $reg->texto);

                    $ValArray[] = clone($valoracion);
                }

                return $ValArray;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }


    }

    public static function setValoracion($id_usu, $id_obra, $point, $texto){
      
        try {
            $conex = new Conexion();
            $result = $conex->query("insert into valoracion (id_usu, id_obra, point, texto) values ($id_usu,$id_obra,$point,'$texto')");
            

            
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }
    }


}