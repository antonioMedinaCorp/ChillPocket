<?php

require_once 'Conexion.php';
require_once 'entities/Valoracion.php';
require_once 'ObraController.php';

class ValoracionController
{


    public static function findByID($id)
    {

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



    public static function findById_obra($obra)
    {

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

    public static function findAllValoracionesByObra($obra)
    {

        try {
            $conex = new Conexion();
            $result = $conex->prepare("select * from valoracion WHERE id_obra=?");
            $result->execute([$obra->id]);

            if ($result->rowCount()) {

                while ($reg = $result->fetchObject()) {
                    $valoracion = new Valoracion($reg->id, $reg->id_usu, $reg->id_obra, $reg->point, $reg->texto);

                    $ValArray[] = clone ($valoracion);
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

    public static function findAllValoracionesByIdUsuario($id)
    {

        try {
            $conex = new Conexion();
            $result = $conex->query("select * from valoracion WHERE id_usu='$id'");


            if ($result->rowCount()) {

                while ($reg = $result->fetchObject()) {
                    $valoracion = new Valoracion($reg->id, $reg->id_usu, $reg->id_obra, $reg->point, $reg->texto);

                    $ValArray[] = clone ($valoracion);
                }

                return $ValArray;
            }

            //return $result;

            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die($exc->getMessage());
        }
    }

    public static function setValoracion($id_usu, $id_obra, $point, $texto)
    {

        try {
            $conex = new Conexion();
            $result = $conex->prepare("insert into valoracion (id_usu, id_obra, point, texto) values (?,?,?,?)");
            $result->execute([$id_usu, $id_obra, $point, $texto]);


            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function modificarValoracion(Valoracion $valor)
    {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE valoracion SET id_usu='$valor->id_usu', id_obra='$valor->id_obra', point='$valor->point', texto='$valor->texto' WHERE id='$valor->id'");
        } catch (PDOException $ex) {

            echo 'no inserto';


            //mata el programa
        }
        unset($result);
        unset($conex);
    }

    public static function getMediaPointByIdObra($id_obra)
    {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("select avg(point) as media from valoracion WHERE id_obra=?");
            $result->execute([$id_obra]);

            if ($result->rowCount()) {
                $reg = $result->fetchObject();

                return $reg->media;
            }
            unset($result);
            unset($conex);
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd');
        }
    }

    public static function delete($id)
    {
        try {
            $conex = new Conexion();
            $conex3 = new Conexion();

            $valoracion = ValoracionController::findByID($id);

            $conex->exec("DELETE from valoracion WHERE id=" . $valoracion->id);

            $avg = ValoracionController::getMediaPointByIdObra($valoracion->id_obra);

            $avgRound = round($avg);

            $conex3->exec("UPDATE obra o SET `point_avg` =" . $avgRound . " WHERE (`id` =" . $valoracion->id_obra . ");");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        unset($result);
        unset($conex);
    }
}
