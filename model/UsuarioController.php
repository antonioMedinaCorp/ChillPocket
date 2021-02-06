<?php
require_once 'Conexion.php';
require_once '../entities/Usuario.php';

    class UsuarioController{
        public function getAllUser(){
            try {
                $conex = new Conexion();
                $result = $conex->prepare("select * from usuarios");                
    
                if ($result->rowCount()) {
                    $u = new Usuario();
                    while($row = $result->fetchObject()){
                        $u->newUser($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                        $usuarios[] = clone($u);
                        $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                    }
                    return $usuarios;
                }else
                    return false;
                
            } catch (PDOException $exc) {
                $errores[] = $exc->getMessage();
                die('Error en bbdd');
            }
            unset($result);
            unset($conex);
        }

        public function findUserByUsername($username){
            try {
                $conex = new Conexion();
                $result = $conex->query("SELECT * FROM usuarios where user_name = '$username'");
                if ($result->rowCount()) {
                    
                    $u = new Usuario();
                    while ($row = $result->fetchObject()) {                   
                        $u->newUser($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
    
                        
                        $usuarios[] = clone($u);
                        $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                    }
                   
                    return $usuarios;
                } else
                    return false;
            } catch (PDOException $ex) {
                $errores[] = $ex->getMessage();
                die('Error en bbdd');
            }
            unset($result);
            unset($conex);
        }

        public function findUserByUsernameAndPass($username, $pass){
            try {
                $conex = new Conexion();
                $result = $conex->query("SELECT * FROM usuarios where user_name = '$username' and password='$pass'");
                if ($result->rowCount()) {
                    
                    $u = new Usuario();
                    while ($row = $result->fetchObject()) {                   
                        $u->newUser($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
    
                        
                        $usuarios[] = clone($u);
                        $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_postal, $row->phone, $row->rol);
                    }
                   
                    return $usuarios;
                } else
                    return false;
            } catch (PDOException $ex) {
                $errores[] = $ex->getMessage();
                die('Error en bbdd');
            }
            unset($result);
            unset($conex);
        }

        public function editUser(Usuario $u){
            try {
                $conex = new Conexion();
                $conex->query("UPDATE usuarios SET password = '$u->password', name = '$u->name', apel1 = '$u->apel1', apel2 = '$u->apel2', birthdate = '$u->birthdate', country = '$u->country', cod_post = '$u->cod_post', phone = '$u->phone' WHERE id='$u->id'");
                
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
                $result = $conex->query("DELETE FROM usuarios WHERE id='$id'");            
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
                $conex->exec("INSERT INTO usuarios  VALUES ('$u->id', '$u->user_name', '$u->password', '$u->name', '$u->apel1', '$u->apel2', '$u->birthdate', '$u->country', '$u->cod_postal', '$u->phone', '$u->rol')");
                
                
                
            } catch (PDOException $ex) {            
                $errores[] = $ex->getMessage();
                die('Error en bbdd');
                
            }
            unset($result);
            unset($conex);

        }


    }
?>