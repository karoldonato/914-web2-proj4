<?php
require_once '../model/OcorrenciaDAO.php';
require_once '../model/Ocorrencia.php';

class OcorrenciaController {
    private $dao;
    
    function __construct() {
        $this->dao = new OcorrenciaDAO();
    }
    
    function registrarOcorrencia(Ocorrencia $ocorrencia) {
        $this->dao->insert($ocorrencia);
        $ocorrencias = $this->dao->selectOcorrencias();
        $id = $ocorrencias[0]->getId();
        
        $i = 0;
        while(array_key_exists ("arquivo$i", $_FILES)) {
            $nome = explode(".", $_FILES["arquivo$i"]['name']);
            $extensao = end($nome);
            $filePath = "anexos/". $id . "_$i." . $extensao;
            move_uploaded_file($_FILES["arquivo$i"]['tmp_name'], "../$filePath");
            $i++;
        }
    }
    
    function buscarOcorrencias() {
        return $this->dao->selectOcorrencias();
    }
    
    function buscarOcorrenciaPorId($id) : Ocorrencia {
        return $this->dao->selectOcorrenciaById($id);
    }
}

if(array_key_exists("desc", $_POST) && array_key_exists("horario", $_POST) 
        && array_key_exists("cx", $_POST) && array_key_exists("cy", $_POST)) {
    (new OcorrenciaController())->registrarOcorrencia(new Ocorrencia(0, $_POST['tipo'],
            $_POST['desc'], $_POST['horario'], $_POST['cx'], $_POST['cy']));
    header("Location: ../view/index.php");
}