<?php

class Valoracion {

    private $id;
    private $id_usu;
    private $id_obra;
    private $point;
    private $texto;

    function __construct($id, $id_usu, $id_obra, $point, $texto) {
        $this->id = $id;
        $this->id_usu = $id_usu;
        $this->id_obra = $id_obra;
        $this->point = $point;
        $this->texto = $texto;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
