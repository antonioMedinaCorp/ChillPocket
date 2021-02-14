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
                       $u = new Usuario($row->id, $row->user_name, $row->password, $row->name, $row->apel1, $row->apel2, $row->birthdate, $row->country, $row->cod_post, $row->phone, $row->rol);
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
                $result = $conex->query("SELECT * FROM usuario where user_name = '$username'");
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
                $result = $conex->query("SELECT * FROM usuario where user_name = '$username' and password='$pass'");
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
                $conex->query("UPDATE usuario SET password = '$u->password', name = '$u->name', apel1 = '$u->apel1', apel2 = '$u->apel2', birthdate = '$u->birthdate', country = '$u->country', cod_post = '$u->cod_post', phone = '$u->phone' WHERE id='$u->id'");
                
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
                $conex->exec("INSERT INTO usuario  VALUES ('$u->id', '$u->user_name', '$u->password', '$u->name', '$u->apel1', '$u->apel2', '$u->birthdate', '$u->country', '$u->cod_post', '$u->phone', '$u->rol')");
                               
                
            } catch (PDOException $ex) {            
                $errores[] = $ex->getMessage();
                die( $ex->getMessage());
                
            }
            unset($result);
            unset($conex);

        }

        public static function calculoDeRowsPorPaginas($limit){
            try {
                $conex = new Conexion();
                $result = $conex->query("select * from usuario");  
                $result->execute();                
                $total_results = $result->rowCount();
                $total_pages = ceil($total_results/$limit);
                return $total_pages;            
                
            } catch (PDOException $exc) {
                $errores[] = $exc->getMessage();
                die('Error en bbdd'. $exc->getMessage());
            }
            unset($result);
            unset($conex);
        }

        public static function usuariosPorPagina($start, $limit){
            try {
                $conex = new Conexion();
                $result = $conex->prepare("SELECT * FROM usuario ORDER BY id ASC LIMIT $start, $limit");  
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


    
?>