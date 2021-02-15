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
                $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

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
                $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                return $obra;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }

    }

    public static function setObra( $title, $subtitulo, $sinopsis, $critica, $tipo, $imagen, $img_min, $point_adm, $point_avg, $video, $genre, $id_adm){
      
        try {
            $conex = new Conexion();
            $sql = "INSERT INTO `puntocritico`.`obra` ( `title`, `subtitulo`, `sinopsis`, `critica`, `tipo`, `imagen`, `img_min`, `point_adm`, `point_avg`, `video`, `genre`, `id_adm`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

            $result = $conex->prepare($sql);
             $result->execute([$title, $subtitulo, $sinopsis, $critica, $tipo, $imagen, $img_min, $point_adm, $point_avg, $video, $genre, $id_adm]);
            
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function findAllObrasByGenero($gender){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE gender=?");
            $result->execute([$gender]);

            if ($result->rowCount()) {

                while($reg = $result->fetchObject()){
                    $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                    $obraArray[] = clone($obra);
                }

                return $obraArray;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }


    }

    public static function findAllObrasByTipo($tipo){

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from obra WHERE tipo=?");
            $result->execute([$tipo]);

            if ($result->rowCount()) {

                while($reg = $result->fetchObject()){
                    $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

                    $obraArray[] = clone($obra);
                }

                return $obraArray;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }


    }

    public static function findAllObras(){

        try {
            $conex = new Conexion();
            $result = $conex->query("select * from obra");
            if ($result->rowCount()) {

                while($reg = $result->fetchObject()){
                    $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);
                    $obraArray[] = clone($obra);
                }

                return $obraArray;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd'. $exc->getMessage());
        }


    }

    public static function delete($id){
        try{
            $conex = new Conexion();
            $conex -> exec("DELETE from obra WHERE id='$id'");
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function update(Obra $obra){
        try{
            $conex = new Conexion();
           // $obra = new Obra($reg->id, $reg->title, $reg->subtitulo, $reg->sinopsis, $reg->critica, $reg->tipo, $reg->imagen, $reg->img_min, $reg->point_adm, $reg->point_avg, $reg->video, $reg->genre, $reg->id_adm);

            $conex->exec("UPDATE obra SET title='$obra->title', subtitulo='$obra->subtitulo', sinopsis='$obra->sinopsis', critica='$obra->critica', tipo='$obra->tipo', imagen='$obra->imagen', img_min='$obra->img_min', point_adm='$obra->point_adm', point_avg='$obra->point_avg', video='$obra->video', genre='$obra->genre', id_adm='$obra->id_adm' WHERE id='$obra->id'");
        }catch(PDOException $ex){
            die('error con la base de datos'.$ex->getMessage());
        }
        unset($result);
        unset($conex);

    }

    public static function calculoDeRowsPorPaginas($limit){
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from obra");  
            $result->execute();                
            $total_results = $result->rowCount();
            $total_pages = ceil($total_results/5);
            return $total_pages;            
            
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd'. $exc->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function obrasPorPagina($start, $limit){
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM obra ORDER BY id ASC LIMIT $start, $limit");  
           $result->execute();
           $result->setFetchMode(PDO::FETCH_OBJ);
           return $result->fetchAll();
            
               
            
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd'. $exc->getMessage());
        }
        unset($result);
        unset($conex);
    }

}