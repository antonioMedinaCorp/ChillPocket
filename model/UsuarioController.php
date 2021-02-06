<?php
require_once 'Conexion.php';
require_once '../entities/Usuario.php';
    class UsuarioController{
        public function newUser(){
            $conex = new Conexion();
            $result = $conex->query("insert into usuarios ")
        }
    }
?>