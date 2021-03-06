<?php
require_once 'Conexion.php';
require_once 'entities/Usuario.php';

class UsuarioController
{
    public static function getAllUser()
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario");

            if ($result->rowCount()) {
                //$u = new Usuario();
                while ($row = $result->fetchObject()) {
                    // $u->newUser($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                    $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_post, $row->phone, $row->rol);
                    $usuarios[] = clone ($u);
                }
                return $usuarios;
            } else
                return false;
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd' . $exc->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function findUserByUsername($username)
    {
        try {
            $conex = new Conexion();
            $result = $conex->prepare('SELECT * FROM usuario where user_name = ?');
            $result->bindParam(1, $username);
            $result->execute();
            if ($result->rowCount()) {

                $row = $result->fetchObject();

                $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_post, $row->phone, $row->rol);
                return $u;
            } else
                return false;
        } catch (PDOException $ex) {
            $errores[] = $ex->getMessage();
            die($ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function findUserByUsernameAndPass($username, $pass)
    {
        try {
            $conex = new Conexion();
            
            $result = $conex->prepare("SELECT * FROM usuario where user_name=? and password=?");
            
            $result->execute([$username, $pass]);
            if ($result->rowCount()) {

            $row = $result->fetchObject();

            $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
            return $u;
            } else
                return false;
        } catch (PDOException $ex) {
            $errores[] = $ex->getMessage();
            die($ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function editUser(Usuario $u)
    {
        try {
            $conex = new Conexion();
            $md5Pass = md5($u->password);
            $ps = $conex->prepare("UPDATE usuario SET password = ? , name = ?, apel1 = ?, apel2 = ?, birthdate = ?, country = ?, cod_post = ?, phone = ? WHERE id=?");
            $ps->bindValue(1, $md5Pass);
            $ps->bindValue(2, $u->name);
            $ps->bindValue(3, $u->apel1);
            $ps->bindValue(4, $u->apel2);
            $ps->bindValue(5, $u->birthdate);
            $ps->bindValue(6, $u->country);
            $ps->bindValue(7, $u->cod_post);
            $ps->bindValue(8, $u->phone);
            $ps->bindValue(9, $u->id);
            $ps->execute();
        } catch (PDOException $ex) {
            $errores[] = $ex->getMessage();
            die('Error en bbdd'.  $ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function deleteUser($id)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("DELETE FROM usuario WHERE id='$id'");
        } catch (PDOException $ex) {
            $errores[] = $ex->getMessage();
            die($ex->getMessage().' Error en bbdd');
        }
        unset($result);
        unset($conex);
    }

    public static function newUser(Usuario $u)
    {
        try {
            $conex = new Conexion();
            $md5Pass = md5($u->password);
            $ps = $conex->prepare("INSERT INTO usuario  VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $ps->bindValue(1, $u->id);
            $ps->bindValue(2, $u->user_name);
            $ps->bindValue(3, $md5Pass);
            $ps->bindValue(4, $u->name);
            $ps->bindValue(5, $u->apel1);
            $ps->bindValue(6, $u->apel2);
            $ps->bindValue(7, $u->birthdate);
            $ps->bindValue(8, $u->country);
            $ps->bindValue(9, $u->cod_post);
            $ps->bindValue(10, $u->phone);
            $ps->bindValue(11, $u->rol);
            $ps->execute();
        } catch (PDOException $ex) {
            $errores[] = $ex->getMessage();
            die($ex->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function calculoDeRowsPorPaginas($limit)
    {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario");
            $result->execute();
            $total_results = $result->rowCount();
            $total_pages = ceil($total_results / $limit);
            return $total_pages;
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd' . $exc->getMessage());
        }
        unset($result);
        unset($conex);
    }

    public static function usuariosPorPagina($start, $limit)
    {
        try {
            $conex = new Conexion();
            $result = $conex->prepare("SELECT * FROM usuario ORDER BY id ASC LIMIT $start, $limit");
            $result->execute();
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result->fetchAll();
        } catch (PDOException $exc) {
            $errores[] = $exc->getMessage();
            die('Error en bbdd' . $exc->getMessage());
        }
        unset($result);
        unset($conex);
    }
}
