<?php

require_once 'Conexion.php';
require_once '../entities/Valoracion.php';

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


    
    public function findById_obra($obra){

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
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }


}