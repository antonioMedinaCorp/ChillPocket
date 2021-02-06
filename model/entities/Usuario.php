<?php

class Usuario {

    private $id;
    private $user_name;
    private $password;
    private $name;
    private $apel1;
    private $apel2;
    private $birthdate;
    private $country;
    private $cod_post;
    private $phone;
    private $rol;


    function __construct($id="", $user_name="", $password="", $name="", $apel1="", $apel2="", $birthdate="", $country="", $cod_post="", $phone="", $rol="") {
        $this->id = $id;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->name = $name;
        $this->apel1 = $apel1;
        $this->apel2 = $apel2;
        $this->birthdate = $birthdate;
        $this->country = $country;
        $this->cod_post = $cod_post;
        $this->phone = $phone;
        $this->rol = $rol;
    }

    function newUser($id, $user_name, $password, $name, $apel1, $apel2, $birthdate, $country, $cod_post, $phone, $rol){
        $this->id = $id;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->name = $name;
        $this->apel1 = $apel1;
        $this->apel2 = $apel2;
        $this->birthdate = $birthdate;
        $this->country = $country;
        $this->cod_post = $cod_post;
        $this->phone = $phone;
        $this->rol = $rol;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "Usuario:" . $this->user_name . " con id:" . $this->id;
    }

}