<?php

class Obra {

    private $id;
    private $title;
    private $subtitulo;
    private $critica;
    private $tipo;
    private $imagen;
    private $img_min;
    private $point_adm;
    private $point_avg;
    private $video;
    private $genre;
    private $id_adm;

    function __construct($id, $title, $subtitulo, $sinopsis, $critica, $tipo, $imagen, $img_min, $point_adm, $point_avg, $video, $genre, $id_adm) {
        $this->id = $id;
        $this->title = $title;
        $this->subtitulo = $subtitulo;
        $this->sinopsis = $sinopsis;
        $this->critica = $critica;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
        $this->img_min = $img_min;
        $this->point_adm = $point_adm;
        $this->point_avg = $point_avg;
        $this->video = $video;
        $this->genre = $genre;
        $this->id_adm = $id_adm;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

}
