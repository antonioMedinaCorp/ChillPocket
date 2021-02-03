<?php

require_once 'Conexion.php';
require_once '../entities/Obra.php';

class ObraController{
    
    public function findByID($id){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE id=?");
            $result->execute([$id]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $obra = new Obra($reg->id, $reg->title, $reg->type, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                return $obra;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }


    public function findByTitle($title){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE title LIKE ?");
            $result->execute([$title]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $obra = new Obra($reg->id, $reg->title, $reg->type, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                return $obra;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }

}