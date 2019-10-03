<?php
require_once 'Ocorrencia.php';
class OcorrenciaDAO {
    private $conexao;
    
    function __construct() {
        $this->conexao = new PDO('mysql:host=localhost;dbname=db_proj3', 'root', '');
    }
    
    function insert(Ocorrencia $ocorrencia) {
        $stmt = $this->conexao->prepare("INSERT INTO ocorrencias (tipo, descricao,"
                . " horario, coordenadaX, coordenadaY) VALUES (:t, :d, :h, :x, :y)");
        
        $stmt->bindValue(":t", $ocorrencia->getTipo());
        $stmt->bindValue(":d", $ocorrencia->getDescricao());
        $stmt->bindValue(":h", $ocorrencia->getHorario());
        $stmt->bindValue(":x", $ocorrencia->getCordenadaX());
        $stmt->bindValue(":y", $ocorrencia->getCordenadaY());
        
        $stmt->execute();
    }
    
    function selectOcorrencias() {
        $stmt = $this->conexao->prepare("SELECT * FROM ocorrencias ORDER BY id DESC");
        $stmt->execute();
        
        $ocorrencias = array();
        while($row = $stmt->fetch()){
            array_push($ocorrencias, new Ocorrencia($row['id'], $row['tipo'],
                    $row['descricao'], $row['horario'], $row['coordenadaX'],
                    $row['coordenadaY']));
	}
        
        return $ocorrencias;
    }
    
    function selectOcorrenciaById($id) : Ocorrencia {
        $stmt = $this->conexao->prepare("SELECT * FROM ocorrencias WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $ocorrencia = new Ocorrencia($row['id'], $row['tipo'],
            $row['descricao'], $row['horario'], $row['coordenadaX'],
            $row['coordenadaY']);
        
        return $ocorrencia;
    }
}