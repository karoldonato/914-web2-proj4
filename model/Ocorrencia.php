<?php

class Ocorrencia {
    private $id;
    private $tipo;
    private $descricao;
    private $horario;
    private $coordenadaX;
    private $coordenadaY;
    
    function __construct($id, $tipo, $descricao, $horario, $cordenadaX, $cordenadaY) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->horario = $horario;
        $this->cordenadaX = $cordenadaX;
        $this->cordenadaY = $cordenadaY;
    }
    
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getHorario() {
        return $this->horario;
    }

    function getCordenadaX() {
        return $this->cordenadaX;
    }

    function getCordenadaY() {
        return $this->cordenadaY;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setCordenadaX($cordenadaX) {
        $this->cordenadaX = $cordenadaX;
    }

    function setCordenadaY($cordenadaY) {
        $this->cordenadaY = $cordenadaY;
    }
}
