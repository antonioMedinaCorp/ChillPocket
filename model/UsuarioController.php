<?php
require_once 'Conexion.php';
require_once 'entities/Usuario.php';

    class UsuarioController{
        public static function getAllUser(){
            try {
                $conex = new Conexion();
                $result = $conex->query("select * from usuario");                
    
                if ($result->rowCount()) {
                    //$u = new Usuario();
                    while($row = $result->fetchObject()){
                       // $u->newUser($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                       $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                       $usuarios[] = clone($u);
                    }
                    return $usuarios;
                }else
                    return false;
                
            } catch (PDOException $exc) {
                $errores[] = $exc->getMessage();
                die('Error en bbdd'. $exc->getMessage());
            }
            unset($result);
            unset($conex);
        }

        public static function findUserByUsername($username){
            try {
                $conex = new Conexion();
                $result = $conex->prepare('SELECT * FROM usuario where user_name = ?');
                $result->bindParam(1, $username);
                $result->execute();
                if ($result->rowCount()) {
                    
                    $row = $result->fetchObject();
                                      
                    $u=new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_post, $row->phone, $row->rol);
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

        public static function findUserByUsernameAndPass($username, $pass){
            try {
                $conex = new Conexion();
                $md5Pass = md5($pass);
                $result = $conex->prepare("SELECT * FROM usuario where user_name =? and password=? ");
                $result->bindParam(1, $username);
                $result->bindParam(2, $md5Pass);
                $result->execute();
                if ($result->rowCount()) {
                    
                    $row = $result->fetchObject();
                                      
                        $u=new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
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

        public static function editUser(Usuario $u){
            try {
                $conex = new Conexion();
                $md5Pass = md5($u->password);
                $ps = $conex->prepare("UPDATE usuario SET password = ? , name = ?, apel1 = ?, apel2 = ?, birthdate = ?, country = ?, cod_post = ?, phone = '$u->phone' WHERE id=?");
                $ps->bindParam(1, $md5Pass);
                $ps->bindParam(2, $u->name);
                $ps->bindParam(3, $u->apel1);
                $ps->bindParam(4, $u->apel2);
                $ps->bindParam(5, $u->birthdate);
                $ps->bindParam(6, $u->country);
                $ps->bindParam(7, $u->cod_post);
                $ps->bindParam(8, $u->phone);
                $ps->bindParam(9, $u->id);
                $ps->execute();
            } catch (PDOException $ex) {
                $errores[] = $ex->getMessage();
                die('Error en bbdd');
            }
            unset($result);
            unset($conex);
        } 

        public static function deleteUser($id) {
            try {
                $conex = new Conexion();
                $result = $conex->query("DELETE FROM usuario WHERE id='$id'");            
            } catch (PDOException $ex) {
                $errores[] = $ex->getMessage();
                die('Error en bbdd');
            }
            unset($result);
            unset($conex);
        }

        public static function newUser(Usuario $u){
            try {
                $conex = new Conexion();
                $md5Pass = md5($u->password);
                $ps = $conex->prepare("INSERT INTO usuario  VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $ps->bindParam(1, $u->id);
                $ps->bindParam(2, $u->user_name);
                $ps->bindParam(3, $md5Pass);
                $ps->bindParam(4, $u->name);
                $ps->bindParam(5, $u->apel1);
                $ps->bindParam(6, $u->apel2);
                $ps->bindParam(7, $u->birthdate);
                $ps->bindParam(8, $u->country);
                $ps->bindParam(9, $u->cod_post);
                $ps->bindParam(10, $u->phone);
                $ps->bindParam(11, $u->rol);
                $ps->execute();
                
                
                
            } catch (PDOException $ex) {            
                $errores[] = $ex->getMessage();
                die( $ex->getMessage());
                
            }
            unset($result);
            unset($conex);

        }


    }
?>