<?php

require_once 'Conexion.php';
require_once 'entities/Obra.php';

class ObraController{
    
    public static function findByID($id){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE id=?");
            $result->execute([$id]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->type, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                return $obra;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }


    public static function findByTitle($title){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE title LIKE ?");
            $result->execute([$title]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();
                $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->type, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                return $obra;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }

    public static function setObra( $title, $subtitulo, $sinopsis, $critica, $type, $imagen, $img_min, $point_adm, $point_avg, $video, $genre, $id_adm){
      
        try {
            $conex = new Conexion();
            $sql = "INSERT INTO `puntocritico`.`obra` ( `title`, `subtitulo`, `sinopsis`, `critica`, `type`, `imagen`, `img_min`, `point_adm`, `point_avg`, `video`, `genre`, `id_adm`) 
            VALUES ($title, $subtitulo, $sinopsis, $critica, $type, $imagen, $img_min, $point_adm, $point_avg, $video, $genre, $id_adm)";
            echo $sql;
            $result = $conex->query($sql);
            

            
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }
    }

}