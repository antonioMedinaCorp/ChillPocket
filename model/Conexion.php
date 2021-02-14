<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author anton
 */
class Conexion extends PDO {

    private $dsn = "mysql:host=localhost;dbname=puntocritico;charset=utf8mb4";
    private $usu = "root";
    private $pass = "1234";
    private $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct() {
        parent::__construct($this->dsn, $this->usu, $this->pass, $this->opciones);
    }

}
